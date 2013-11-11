<div id="menu" class="main-menu">
<?php if($sf_user->isAuthenticated()): ?>
  <?php $currentModule = sfContext::getInstance()->getModuleName();
        $scenarioId = $sf_user->getAttribute('scenarioId', 0); ?>
  <ul>
    <li<?php if($currentModule == 'default'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Home', '@homepage') ?>
    </li>
    <li>
      <?php echo link_to('About', '@about') ?>
    </li>
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

  <?php if($sf_user->hasCredential('admin')): ?>
    <li<?php if($currentModule == 'user'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Users', '@user') ?>
    </li>
  <?php endif; ?>
  </ul>
  <?php if ($scenarioId && in_array($currentModule, array('technology','architecture','equipment'))): ?>
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
  <?php elseif ($scenarioId && in_array($currentModule, array('operator','service'))): ?>
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
