<?php use_helper('I18N'); ?>

<div id="sf_admin_container" class="sf_admin_edit ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?php echo __('View Scenario - %%description%%', array('%%description%%' => $scenario->getDescription()), 'messages') ?></h1>
  </div>

<?php if ($sf_user->hasCredential('manager') && !$scenario->finished): ?>
  <ul class="sf_admin_td_actions">
    <?php if (!$scenario->started): ?>
        <?php echo $helper->linkToStartSimulation($scenario, array('params' => array(  ), 'class_suffix' => 'startSimulation', 'label' => 'Initialize Simulation',)) ?>
        <?php echo $helper->linkToEdit($scenario, array('params' => array(  ), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
        <?php echo $helper->linkToDelete($scenario, array('params' => array(  ), 'confirm' => 'This removal is irreversible! Are you sure you want to proceed?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
    <?php else: ?>
        <?php echo $helper->linkToNextStep($scenario, array('params' => array(  ), 'class_suffix' => 'nextStep', 'label' => 'Next Tick',)) ?>
        <?php echo $helper->linkToNextDecision($scenario, array('params' => array(  ), 'class_suffix' => 'nextDecision', 'label' => 'Next Decision',)) ?>
        <?php echo $helper->linkToFinish($scenario, array('params' => array(  ), 'class_suffix' => 'finish', 'label' => 'Finish',)) ?>
    <?php endif ?>
  </ul>
<?php endif ?>

<?php include_partial('show', array('form' => $form, 'scenario' => $scenario, 'configuration' => $configuration)) ?>
</div>
