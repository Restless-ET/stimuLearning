<?php use_helper('I18N'); ?>

<div id="sf_admin_container">

<?php if ($sf_user->hasCredential('admin')): ?>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($scenario, array('params' => array(  ), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($scenario, array('params' => array(  ), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
  </ul>
<br /><br />
<?php endif ?>

<?php include_partial('scenario/market_share_chart', array('scenario' => $scenario)); ?>

</div>
