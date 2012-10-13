<div id="menu" class="main-menu">
<?php if($sf_user->isAuthenticated()): ?>
  <?php $currentModule = sfContext::getInstance()->getModuleName(); ?>
  <ul>
  <?php if($sf_user->hasCredential('admin')): ?>
    <li<?php if($currentModule == 'user'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Users', '@user') ?>
    </li>
    <li<?php if($currentModule == 'oficiais'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Oficiais', '@oficiais') ?>
    </li>
    <?php if($sf_user->hasCredential('admin')): ?>
      <li<?php if($currentModule == 'clubes'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Clubes', '@clubes') ?>
      </li>
    <?php endif; ?>
    <li<?php if($currentModule == 'dirigentes'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Dirigentes', '@dirigentes') ?>
    </li>
  <?php endif; ?>
  <?php if($sf_user->hasCredential(array('atleta', 'oficial'), false) && $sf_user->getAttribute('subscription_until', '1970-01-01') <= $sf_user->getAttribute('season_start')): ?>
    <li<?php if($currentModule == 'utilizador'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Renovar Filiação', 'utilizador/renewal?id='.$sf_user->getAttribute('id')) ?>
    </li>
  <?php else: ?>
    <li<?php if(in_array($currentModule, array('provas', 'inscricoesatletas', 'inscricoesequipas', 'inscricoesoficiais'))): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Provas', '@provas') ?>
    </li>
  <?php endif; ?>
    <li<?php if($currentModule == 'movimentos'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Movimentos', '@movimentos') ?>
    </li>
  <?php if($sf_user->hasCredential('admin_edit')): ?>
    <li<?php if(in_array($currentModule, array('configuracoes', 'administradores', 'associacoes', 'configuracoesatleta', 'configuracoesoficial',
         'configuracoesdirigente', 'configuracoesclube', 'funcoesoficial', 'funcoesdirigente', 'filiacoesatleta'))): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Configurações', 'configuracoes/edit?id=1') ?>
    </li>
  <?php endif; ?>
    <li>|</li>
  <?php if($sf_user->hasCredential('atleta')): ?>
    <li<?php if ($currentModule == 'atletas'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Meus Operadores', 'atletas/edit?id='.$sf_user->getAttribute('id')) ?>
    </li>
  <?php elseif ($sf_user->hasCredential('clube')): ?>
    <li<?php if ($currentModule == 'clubes'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Meus Detalhes', 'clubes/edit?id='.$sf_user->getAttribute('id')) ?>
    </li>
  <?php elseif ($sf_user->hasCredential('oficial')): ?>
    <li<?php if ($currentModule == 'oficiais'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Meus Detalhes', 'oficiais/edit?id='.$sf_user->getAttribute('id')) ?>
    </li>
  <?php endif; ?>
    <li<?php if(sfContext::getInstance()->getActionName()=='changePassword'): ?> class="active"<?php endif; ?>>
      <?php echo link_to('Mudar Password', '@changePassword') ?></li>
    <li><?php echo link_to('Sair', '@logout') ?></li>
  </ul>
  <?php if($sf_user->hasCredential('superadmin') && in_array($currentModule, array('configuracoes', 'administradores', 'associacoes', 'configuracoesatleta',
       'configuracoesoficial', 'configuracoesdirigente', 'configuracoesclube', 'funcoesoficial', 'funcoesdirigente', 'filiacoesatleta'))): ?>
  <br />
  <div id="sub-menu" class="sub-menu">
    <ul>
      <li<?php if($currentModule == 'configuracoes'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Gerais', 'configuracoes/edit?id=1') ?>
      </li>
      <li<?php if($currentModule == 'administradores'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Administradores', '@administradores') ?>
      </li>
      <li<?php if($currentModule == 'associacoes'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Associações', '@associacoes') ?>
      </li>
      <li<?php if($currentModule == 'configuracoesatleta'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Atletas', 'configuracoesatleta/edit?id=1') ?>
      </li>
      <li<?php if($currentModule == 'filiacoesatleta'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Filiação Atletas', '@tipos_filiacao_atleta') ?>
      </li>
      <li<?php if($currentModule == 'configuracoesclube'): ?> class="active"<?php endif; ?>>
        <?php echo link_to('Clubes', 'configuracoesclube/edit?id=1') ?>
      </li>
    </ul>
  </div>
  <?php endif; ?>
<?php endif; ?>
</div>