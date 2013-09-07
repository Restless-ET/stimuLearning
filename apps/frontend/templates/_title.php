<?php $currentModule = sfContext::getInstance()->getModuleName(); ?>
<?php if ($currentModule == 'operator'): ?>
  <?php echo '<div id="title"><h1>'.link_to('Operators', '@operator').'</h1></div>'; ?>
<?php elseif ($currentModule == 'scenario'): ?>
  <?php echo '<div id="title"><h1>'.link_to('Scenarios', '@scenario').'</h1></div>'; ?>
<?php endif; ?>
