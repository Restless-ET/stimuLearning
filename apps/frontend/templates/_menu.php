<?php $currentModule = sfContext::getInstance()->getModuleName();
      $currentAction = sfContext::getInstance()->getActionName();
      $scenarioId = $sf_user->getAttribute('scenarioId', 0); ?>
<div id="menu">
  <div class="admin-menu">
  <?php if($sf_user->isAuthenticated()): ?>
    <ul>
    <?php if ($sf_user->hasCredential('admin')): ?>
      <li<?php if(in_array($currentModule, array('lib_tech','lib_arch','lib_equip'))): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Library', '@libTech') ?>
      </li>
      <li<?php if($currentModule == 'customization'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Customization', '@customization') ?>
      </li>
      <li<?php if($currentModule == 'user'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Users', '@user') ?>
      </li>
    <?php elseif ($sf_user->getAttribute('username', 'demonstration') != 'demonstration'): ?>
      <li<?php if($currentModule == 'user'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('My profile', 'user/edit?id='.$sf_user->getAttribute('id')); ?>
      </li>
    <?php else: ?>
      <li style="padding: 2px; background-color: white; color: olive;">
        You're on demonstration version! Data reset takes place at 4am (GMT)!
      </li>
    <?php endif; ?>
    </ul>
  <?php endif; ?>
  </div>
  <div class="main-menu">
    <ul>
      <li<?php if ($currentModule == 'default' && $currentAction == 'index'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Home', '@homepage') ?>
      </li>
      <li<?php if ($currentModule == 'default' && $currentAction == 'about'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('About', '@about') ?>
      </li>
    <?php if ($sf_user->isAuthenticated()): ?>
      <?php if ($scenarioId): ?>
        <li<?php if($currentModule == 'scenario'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Scenario', 'scenario/show?id='.$scenarioId); ?>
        </li>
        <li<?php if(in_array($currentModule, array('technology','architecture','equipment'))): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Network', '@technology') ?>
        </li>
        <li<?php if($currentModule == 'operator'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Operators', '@operator') ?>
        </li>
      <?php else: ?>
        <li<?php if($currentModule == 'scenario'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Scenarios', '@scenario'); ?>
        </li>
      <?php endif; ?>
    <?php endif; ?>
    </ul>
  </div>

<?php if ($sf_user->hasCredential('admin')): ?>
  <?php if (in_array($currentModule, array('lib_tech','lib_arch','lib_equip'))): ?>
  <div id="sub-menu">
    <div class="sub-admin">
      <ul>
        <li<?php if ($currentModule == 'libTech'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Technologies', '@libTech') ?>
        </li>
        <li<?php if ($currentModule == 'libArch'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Architectures', '@libArch') ?>
        </li>
        <li<?php if ($currentModule == 'libEquip'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Equipments', '@libEquip') ?>
        </li>
      </ul>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>
<?php if ($scenarioId): ?>
  <?php if (in_array($currentModule, array('technology','architecture','equipment'))): ?>
  <div id="sub-menu">
    <div class="sub-main">
      <ul>
        <li<?php if ($currentModule == 'technology'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Technologies', '@technology') ?>
        </li>
        <li<?php if ($currentModule == 'architecture'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Architectures', '@architecture') ?>
        </li>
        <li<?php if ($currentModule == 'equipment'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Equipments', '@equipment') ?>
        </li>
      </ul>
    </div>
  </div>
  <?php elseif (in_array($currentModule, array('operator','service'))): ?>
  <div id="sub-menu">
    <div class="sub-main">
      <ul>
        <li<?php if ($currentModule == 'service'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Services', '@service') ?>
        </li>
      </ul>
    </div>
  </div>
  <?php endif; ?>
<?php endif;?>
</div>
