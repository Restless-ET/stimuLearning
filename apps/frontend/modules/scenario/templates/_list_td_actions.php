<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_show">
      <?php echo link_to(__('Show', array(), 'messages'), 'scenario/show?id='.$scenario->getId(), array()) ?>
    </li>
  <?php if ($sf_user->hasCredential(array('admin')) && $scenario->status == 'Unstarted'): ?>
    <?php echo $helper->linkToEdit($scenario, array('credentials' => array('admin'), 'params' => array(  ), 'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
  <?php endif; ?>
  <?php if ($sf_user->hasCredential(array('admin')) && $scenario->status == 'Unstarted'): ?>
    <?php echo $helper->linkToDelete($scenario, array('credentials' => array('admin'), 'confirm' => 'This removal is irreversible! Are you sure you want to proceed?', 'params' => array(), 'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <?php endif; ?>
  </ul>
</td>
