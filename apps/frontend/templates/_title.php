<div id="title">
<h1>
<?php $currentModule = sfContext::getInstance()->getModuleName(); ?>
<?php if ($currentModule == 'operator'): ?>
  <?php echo link_to('Operators', '@operator') ?>
<?php elseif ($currentModule == 'scenario'): ?>
  <?php echo link_to('Scenarios', '@scenario') ?>
<?php elseif ($currentModule == 'technology'): ?>
  <?php echo link_to('Technologies', '@technology') ?>
<?php elseif ($currentModule == 'architecture'): ?>
  <?php echo link_to('Architectures', '@architecture') ?>
<?php elseif ($currentModule == 'equipment'): ?>
  <?php echo link_to('Equipments', '@equipment') ?>
<?php elseif($currentModule=='user'): ?>
  <?php echo link_to('Users', '@user') ?>
<?php endif; ?>
</h1>
</div>
