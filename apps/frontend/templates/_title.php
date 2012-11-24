<div id="title">
<h1>
<?php if(sfContext::getInstance()->getModuleName()=='atletas'): ?>
  <?php echo link_to('Atletas', '@atletas') ?>
<?php elseif(sfContext::getInstance()->getModuleName()=='oficiais'): ?>
  <?php echo link_to('Oficiais', '@oficiais') ?>
<?php elseif(sfContext::getInstance()->getModuleName()=='dirigentes'): ?>
  <?php echo link_to('Dirigentes', '@dirigentes') ?>
<?php elseif(sfContext::getInstance()->getModuleName()=='clubes'): ?>
  <?php echo link_to('Clubes', '@clubes') ?>
<?php elseif(sfContext::getInstance()->getModuleName()=='movimentos'): ?>
  <?php echo link_to('Movimentos', '@movimentos') ?>
<?php elseif(sfContext::getInstance()->getModuleName()=='provas' || sfContext::getInstance()->getModuleName()=='inscricoesatletas' || sfContext::getInstance()->getModuleName()=='inscricoesequipas' || sfContext::getInstance()->getModuleName()=='inscricoesoficiais'): ?>
  <?php echo link_to('Provas', '@provas') ?><?php include_component('provas','subTitle'); ?>
<?php elseif(sfContext::getInstance()->getModuleName()=='configuracoes' || sfContext::getInstance()->getModuleName()=='administradores' ||
                sfContext::getInstance()->getModuleName()=='configuracoesatleta' || sfContext::getInstance()->getModuleName()=='configuracoesoficial' ||
                sfContext::getInstance()->getModuleName()=='configuracoesdirigente' || sfContext::getInstance()->getModuleName()=='configuracoesclube' ||
                sfContext::getInstance()->getModuleName()=='funcoesoficial' || sfContext::getInstance()->getModuleName()=='funcoesdirigente'): ?>
  <?php echo link_to('Configurações', 'configuracoes/edit?id=1') ?>
<?php endif; ?>
</h1>
</div>