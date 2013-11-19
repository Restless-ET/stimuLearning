<td style="white-space: nowrap;">
  <ul class="sf_admin_td_actions fg-buttonset fg-buttonset-single">
    <?php echo $helper->linkToShow($architecture, array(  'params' => 'class=fg-button-mini fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'class_suffix' => 'show',  'label' => 'Show',  'ui-icon' => '',)) ?>

    <?php if ($architecture->Operator->user_id == $sf_user->getAttribute('id')): ?>
      <?php if (in_array($architecture->Scenario->finished, array (0 => false,))): ?>
        <?php echo $helper->linkToEdit($architecture, array(  'condition' =>   array(    'variable' => 'Scenario->finished',    'check' =>     array(      0 => false,    ),    'invert' => false,  ),  'params' => 'class=fg-button-mini fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'class_suffix' => 'edit',  'label' => 'Edit',  'ui-icon' => '',)) ?>
      <?php endif; ?>

      <?php if (in_array($architecture->Scenario->finished, array (0 => false,))): ?>
        <?php echo $helper->linkToDelete($architecture, array(  'condition' =>   array(    'variable' => 'Scenario->finished',    'check' =>     array(      0 => false,    ),    'invert' => false,  ),  'confirm' => 'This removal is irreversible! Are you sure you want to proceed?',  'params' => 'class=fg-button-mini fg-button ui-state-default ui-corner-all fg-button-icon-left ',  'class_suffix' => 'delete',  'label' => 'Delete',  'ui-icon' => '',)) ?>
      <?php endif; ?>
    <?php endif; ?>
  </ul>
</td>
