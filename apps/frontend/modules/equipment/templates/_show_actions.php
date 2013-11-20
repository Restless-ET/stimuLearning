<ul class="sf_admin_actions_form">
  <?php echo $helper->linkToList(array(  'params' => 'class= fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'class_suffix' => 'list',  'label' => 'Back to list',  'ui-icon' => '',)) ?>

<?php if ($equipment->Operator->user_id == $sf_user->getAttribute('id') && !$equipment->Scenario->finished): ?>
  <?php echo $helper->linkToEdit($equipment, array(  'credentials' =>   array(    0 =>     array(      0 => 'admin',      1 => 'responsible',    ),  ),  'params' => 'class= fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'class_suffix' => 'edit',  'label' => 'Edit',  'ui-icon' => '',)) ?>

  <?php echo $helper->linkToDelete($form->getObject(), array(  'credentials' =>   array(    0 =>     array(      0 => 'admin',      1 => 'responsible',    ),  ),  'params' => 'class= fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',  'ui-icon' => '',)) ?>
<?php endif; ?>
</ul>
