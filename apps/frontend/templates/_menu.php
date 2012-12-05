<div id="menu" class="main-menu">
<?php if($sf_user->isAuthenticated()): ?>
  <?php $currentModule = sfContext::getInstance()->getModuleName(); ?>
  <ul>
    <li<?php if($currentModule == 'operator'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Operators', '@operator') ?>
    </li>
    <li<?php if($currentModule == 'scenario'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Scenarios', '@scenario') ?>
    </li>
    <li<?php if($currentModule == 'technology'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Technologies', '@technology') ?>
    </li>
    <li<?php if($currentModule == 'architecture'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Architectures', '@architecture') ?>
    </li>
    <li<?php if($currentModule == 'equipment'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Equipments', '@equipment') ?>
    </li>
  <?php if($sf_user->hasCredential('admin')): ?>
    <li<?php if($currentModule == 'user'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Users', '@user') ?>
    </li>
  <?php endif; ?>
  <?php if($sf_user->hasCredential('admin_edit')): ?>
    <li<?php if(in_array($currentModule, array('configuracoes', 'administradores', 'configuracoesatleta'))): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Configurações', 'configuracoes/edit?id=1') ?>
    </li>
  <?php endif; ?>
    <li>|</li>
  <?php if($sf_user->hasCredential('atleta')): ?>
    <li<?php if ($currentModule == 'atletas'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Meus Operadores', 'atletas/edit?id='.$sf_user->getAttribute('id')) ?>
    </li>
  <?php endif; ?>
    <li<?php if(sfContext::getInstance()->getActionName()=='changePassword'): ?> class="active"<?php endif; ?>>
      <?php //echo link_to('Change Password', '@changePassword') ?></li>
    <li><?php echo link_to('Logout', '@logout') ?></li>
  </ul>
  <?php if($sf_user->hasCredential('superadmin') && in_array($currentModule, array('configuracoes', 'administradores', 'configuracoesatleta'))): ?>
  <br />
  <div id="sub-menu" class="sub-menu">
    <ul>
      <li<?php if($currentModule == 'configuracoes'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Gerais', 'configuracoes/edit?id=1') ?>
      </li>
      <li<?php if($currentModule == 'administradores'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Administradores', '@administradores') ?>
      </li>
      <li<?php if($currentModule == 'configuracoesatleta'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Atletas', 'configuracoesatleta/edit?id=1') ?>
      </li>
    </ul>
  </div>
  <?php endif; ?>
<?php endif; ?>
</div>