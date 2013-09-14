<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<?php use_helper('Date')?>

<div class="sf_admin_form">
  <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
    <?php include_partial('scenario/show_form_fieldset', array('scenario' => $scenario, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
  <?php endforeach; ?>
</div>

<div class="curvedContainer" style="display: none;">
  <?php foreach ($configuration->getFormFields($form, 'show') as $fieldset => $fields): ?>
    <div id="sf_fieldset_<?php echo preg_replace('/\W+/', '_', strtolower($fieldset)) ?>" class="tabcontent">
    <table>
    <?php foreach ($fields as $name => $field): ?>
    <?php $attributes = $field->getConfig('attributes', array()); ?>
      <?php if ($field->isPartial()): ?>
        <?php include_partial('scenario/'.$name, array('scenario' => $scenario, 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
      <?php elseif ($field->isComponent()): ?>
        <?php include_component('scenario', $name, array('scenario' => $scenario, 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
      <?php else: ?>
        <tr class="sf_admin_form_row">
          <td><label><?php echo $field->getConfig('label')? $field->getConfig('label'): $field->getName() ?>:</label></td>
          <td>
          <?php $table = Doctrine_Core::getTable($form->getModelName()); ?>
          <?php  $fieldDefinition = $table->getDefinitionOf($field->getName()) ?>
          <?php if($form->getObject()->get($name) == ''): ?>
            <s>&nbsp;&nbsp;&nbsp;</s>
          <?php elseif (isset($fieldDefinition['extra']['currency'])): ?>
            <?php echo number_format($form->getObject()->get($name), 2, ',', '.').' €'?>
          <?php elseif (isset($fieldDefinition['extra']['rate'])): ?>
            <?php echo str_replace('.', ',', $form->getObject()->get($name)).' %' ?>
          <?php elseif ($table->getTypeOf($field->getName()) == 'string'): ?>
            <?php echo str_replace("\n", '<br />', $form->getObject()->get($name)) ?>
          <?php elseif ($table->getTypeOf($field->getName()) == 'date' || $table->getTypeOf($field->getName()) == 'timestamp'): ?>
            <?php echo format_datetime($form->getObject()->get($name), 'dd-MM-yyyy') ?>
          <?php else:  echo $form->getObject()->get($name) ?>
          <?php endif; ?>
          </td>
        </tr>
      <?php endif; ?>

    <?php endforeach; ?>
  </table>
  </div>
  <?php endforeach; ?>
</div>
