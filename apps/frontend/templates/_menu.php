<div id="menu" class="main-menu">
<?php if($sf_user->isAuthenticated()): ?>
  <?php $currentModule = sfContext::getInstance()->getModuleName(); ?>
  <ul>
    <li<?php //if($currentModule == 'default'): ?> class="active"<?php //endif; ?>>
      <?php //echo link_to('Home', '@homepage') ?>
    </li>
    <li<?php if($currentModule == 'operator'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Operators', '@operator') ?>
    </li>
    <li<?php if($currentModule == 'scenario'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Scenarios', '@scenario') ?>
    </li>
  <?php if($sf_user->hasCredential('admin')): ?>
    <li<?php if($currentModule == 'user'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Users', '@user') ?>
    </li>
  <?php endif; ?>
    <li>|</li>
    <li><?php echo link_to('Logout', '@logout') ?></li>
  </ul>
  <?php if (in_array($currentModule, array('scenario','technology','architecture','equipment'))): ?>
    <div id="sub-menu" class="sub-menu">
      <ul>
        <li<?php if($currentModule == 'technology'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Technologies', '@technology') ?>
        </li>
        <li<?php if($currentModule == 'architecture'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Architectures', '@architecture') ?>
        </li>
        <li<?php if($currentModule == 'equipment'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Equipments', '@equipment') ?>
        </li>
      </ul>
    </div>
  <?php elseif (in_array($currentModule, array('operator','service'))): ?>
    <div id="sub-menu" class="sub-menu">
      <ul>
        <li<?php if($currentModule == 'service'): ?> class="active"<?php endif; ?>>
          <?php echo link_to('Services', '@service') ?>
        </li>
      </ul>
    </div>
  <?php endif; ?>
<?php endif; ?>
</div>
