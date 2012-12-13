<?php

/**
 * Description of amWidgetFormSlider
 * Based on sfWidgetFormSlider by Leny Bernard (http://www.leny-bernard.com)
 *
 * @package    stimuLearning
 * @subpackage widget
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class amWidgetFormSlider extends sfWidgetForm
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * min: The slider minimum value (0 by default)
   *  * max: The slider maximum value (100 by default)
   *  * step: The slider step value (1 by default)
   *  * units: The units of the value to show ('' by default)
   *  * strict_limits: Indicates if the min and max limits should be strictly applied (true by default)
   *  * js_on_slide: Some extra javascript code we might want to execute on slide event (e'' by default)
   *
   * @param array $options    An array of options
   * @param array $attributes An array of default HTML attributes
   *
   * @see sfWidgetForm
   *
   * @return nothing
   */
  public function configure($options = array(), $attributes = array())
  {
    $this->addOption('min', 0);
    $this->addOption('max', 100);
    $this->addOption('step', 1);
    $this->addOption('units', '');
    $this->addOption('strict_limits', true);
    $this->addOption('js_on_slide', '');

    $this->addOption('div.class', 'slider');

    $this->addOption('template.html', '
        <style>
        #{input.id}{
        width:35px !important;
        }
        </style>
        <div id="{div.id}" class="{div.class}"></div>
        <!-- <p>
            <label for="units">{label}</label> -->
            <input type="text" id="{input.id}" name="{input.name}" value="{value}"/>
            <span id="unitsLabel">{units}</span>
        <!-- </p> -->
    ');

     $this->addOption('template.javascript', '
    <script type="text/javascript">
        $( "#{div.id}" ).slider({
            value: {value},
            min: {min},
            max: {max},
            step: {step},
            slide: function( event, ui ) {
                //$( "#unitsLabel" ).html("{units}");
                $( "#{input.id}" ).val( ui.value );
                $( "#{input.id}" ).css("width", ui.value.toString().length*10+"px");
                {js_on_slide}
            }
        });
        $( "#{input.id}" ).bind("change input", function(){
            $( "#{input.id}" ).css("width",$( "#{input.id}" ).val().length*10+"px");
            nbr = $( "#{input.id}" ).val();
            if (!isNaN(nbr))
              $( "#{div.id}" ).slider( "value" , nbr );
            if ({strict_limits})
              $(this).val($( "#{div.id}" ).slider("value"));
        });
    </script>
    ');
  }

  /**
   * Render the current widget
   *
   * @param string $name       The element name
   * @param string $value      The value displayed in this widget
   * @param array  $attributes An array of HTML attributes to be merged with the default HTML attributes
   * @param array  $errors     An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    if (is_null($value))
    { $value = $this->getOption('default');
    }
    $min = $this->getOption('min');
    $max = $this->getOption('max');
    $step = $this->getOption('step');
    $units = $this->getOption('units');
    $strict_limits = $this->getOption('strict_limits');
    $js_on_slide = $this->getOption('js_on_slide');
    //$label = $this->getOption('label');

    // define main template variables
    $template_vars = array(
      '{div.id}'        => $this->generateId($name.'_slide'),
      '{div.class}'     => $this->getOption('div.class'),
      '{min}'           => $min,
      '{max}'           => $max,
      '{value}'         => is_null($value) ? ((abs($max) - abs($min)) / 2) : $value,
      //'{label}'       => $label,
      '{step}'          => $step,
      '{units}'         => $units,
      '{input.name}'    => $name,
      '{input.id}'      => $this->generateId($name),
      '{strict_limits}' => $strict_limits ? 1 : 0,
      '{js_on_slide}'   => $js_on_slide,
    );

    // merge templates and variables
    return strtr($this->getOption('template.html').$this->getOption('template.javascript'), $template_vars);
  }
}
