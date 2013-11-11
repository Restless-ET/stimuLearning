<td style="white-space: nowrap;">
  <ul class="sf_admin_td_actions fg-buttonset fg-buttonset-single">
    <?php echo $helper->linkToShow($scenario, array(  'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'show',  'label' => 'Show',  'ui-icon' => '',)) ?>

    <?php if (!$scenario->started && $sf_user->getAttribute('id') == $scenario->responsible_id): ?>
      <?php echo $helper->linkToEdit($scenario, array('params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ', 'class_suffix' => 'edit', 'label' => 'Edit', 'ui-icon' => '',)) ?>
    <?php endif; ?>
    <?php if (!$scenario->started && $sf_user->getAttribute('id') == $scenario->responsible_id): ?>
      <?php echo $helper->linkToDelete($scenario, array('confirm' => 'This removal is irreversible! Are you sure you want to proceed?', 'params' => 'class=fg-button-mini fg-button ui-state-default fg-button-icon-left ',  'class_suffix' => 'delete',  'label' => 'Delete',  'ui-icon' => '',)) ?>
    <?php endif; ?>
  </ul>
</td>
