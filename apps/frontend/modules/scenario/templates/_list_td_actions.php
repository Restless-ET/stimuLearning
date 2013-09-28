<td style="white-space: nowrap;">
  <ul class="sf_admin_td_actions fg-buttonset fg-buttonset-single">
    <?php echo $helper->linkToShow($scenario, array(  'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'show',  'label' => 'Show',  'ui-icon' => '',)) ?>

    <?php if ($sf_user->hasCredential(array('manager')) && !$scenario->started): ?>
      <?php echo $helper->linkToEdit($scenario, array('credentials' => array('manager'), 'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'edit', 'label' => 'Edit', 'ui-icon' => '',)) ?>
    <?php endif; ?>
    <?php if ($sf_user->hasCredential(array('manager')) && !$scenario->started): ?>
      <?php echo $helper->linkToDelete($scenario, array('credentials' => array('manager'), 'confirm' => 'This removal is irreversible! Are you sure you want to proceed?', 'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'delete',  'label' => 'Delete',  'ui-icon' => '',)) ?>
    <?php endif; ?>
  </ul>
</td>
