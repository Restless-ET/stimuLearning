<?php if ($sf_user->getAttribute('id') == $scenario->responsible_id && !$scenario->finished): ?>
  <ul class="sf_admin_actions_form">
    <?php echo $helper->linkToList(array(  'params' => 'class= fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'list',  'label' => 'Back to list',  'ui-icon' => '',)) ?>
    <?php if (!$scenario->started): ?>
        <?php echo $helper->linkToStartSimulation($scenario, array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'startSimulation', 'label' => 'Initialize Simulation', 'ui-icon' => '',)) ?>
        <?php echo $helper->linkToEdit($scenario, array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'edit', 'label' => 'Edit', 'ui-icon' => '',)) ?>
        <?php echo $helper->linkToDelete($scenario, array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'confirm' => 'This removal is irreversible! Are you sure you want to proceed?', 'class_suffix' => 'delete', 'label' => 'Delete', 'ui-icon' => '',)) ?>
    <?php else: ?>
        <?php echo $helper->linkToNextStep($scenario, array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'nextStep', 'label' => 'Next Tick', 'ui-icon' => '',)) ?>
        <?php echo $helper->linkToNextDecision($scenario, array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'nextDecision', 'label' => 'Next Decision', 'ui-icon' => '',)) ?>
        <?php echo $helper->linkToFinish($scenario, array('params' => 'class= fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'finish', 'label' => 'Finish', 'ui-icon' => '',)) ?>
    <?php endif ?>

    <?php //echo $helper->linkToList(array(  'params' => 'class= fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'list',  'label' => 'Back to list',  'ui-icon' => '',)) ?>
    <?php //echo $helper->linkToEdit($scenario, array(  'params' => 'class= fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'edit',  'label' => 'Edit',  'ui-icon' => '',)) ?>
    <?php //echo $helper->linkToDelete($form->getObject(), array(  'params' => 'class= fg-button ui-state-default fg-button-icon-left ',  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',  'ui-icon' => '',)) ?>
  </ul>
<?php endif ?>
