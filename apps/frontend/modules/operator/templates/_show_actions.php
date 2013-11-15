<ul class="sf_admin_actions_form">
  <?php echo $helper->linkToList(array(  'params' => 'class= fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'class_suffix' => 'list',  'label' => 'Back to list',  'ui-icon' => '',)) ?>

<?php if ($operator->Scenario->started): ?>
  <?php if ($sf_user->hasCredential(array(  0 =>   array(    0 => 'admin',    1 => 'responsible',  ),))): ?>
    <?php echo $helper->linkToEdit($operator, array(  'credentials' =>   array(    0 =>     array(      0 => 'admin',      1 => 'responsible',    ),  ),  'params' => 'class= fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'class_suffix' => 'edit',  'label' => 'Edit',  'ui-icon' => '',)) ?>
  <?php endif; ?>

  <?php if ($sf_user->hasCredential(array(  0 =>   array(    0 => 'admin',    1 => 'responsible',  ),))): ?>
    <?php echo $helper->linkToDelete($form->getObject(), array(  'credentials' =>   array(    0 =>     array(      0 => 'admin',      1 => 'responsible',    ),  ),  'params' => 'class= fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',  'ui-icon' => '',)) ?>
  <?php endif; ?>
<?php endif; ?>
</ul>
