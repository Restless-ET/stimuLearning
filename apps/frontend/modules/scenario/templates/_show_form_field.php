<?php if ($field->isPartial()): ?>
  <?php include_partial('scenario/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('scenario', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="<?php echo $class ?>">
    <?php echo $form[$name]->renderLabel($label) ?>
    <div class="content">
      <?php echo $form[$name]->getValue(); ?>
    </div>
  </div>
<?php endif; ?>
