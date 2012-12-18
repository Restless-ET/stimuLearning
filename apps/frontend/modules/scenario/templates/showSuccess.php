<?php use_helper('I18N'); ?>

<div id="sf_admin_container">

<?php if ($sf_user->hasCredential('admin') && $scenario->status == 'Unstarted'): ?>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($scenario, array('params' => array(  ), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($scenario, array('params' => array(  ), 'confirm' => 'This removal is irreversible! Are you sure you want to proceed?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
  </ul>
<br />
<?php endif ?>

<?php include_partial('show', array('form' => $form, 'scenario' => $scenario, 'configuration' => $configuration)) ?>

</div>
