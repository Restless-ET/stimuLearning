<?php use_helper('I18N', 'Date') ?>
<?php include_partial('scenario/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Scenario', array(), 'messages') ?></h1>

  <?php include_partial('scenario/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('scenario/form_header', array('scenario' => $scenario, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('scenario/market_share_chart'); ?>
    <?php include_partial('scenario/form', array('scenario' => $scenario, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('scenario/form_footer', array('scenario' => $scenario, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
