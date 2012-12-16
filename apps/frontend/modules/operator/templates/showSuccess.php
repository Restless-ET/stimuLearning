<?php use_helper('I18N'); ?>

<div id="sf_admin_container">

<?php if ($sf_user->hasCredential('admin')): ?>
  <ul class="sf_admin_td_actions">
    <?php //echo $helper->linkToEdit($scenario, array('params' => array(  ), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php // echo $helper->linkToDelete($scenario, array('params' => array(  ), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
  </ul>
<?php endif ?>

  <fieldset id="sf_fieldset_operator_status">
    <h2>Operator <b><?php echo $operator->name ?></b> status at scenario <b><?php echo $operator->Scenario ?></b></h2>
  </fieldset>

  <fieldset id="sf_fieldset_operator_simulated_data">
    <h2>Operator Simulated Data</h2>
    <?php include_partial('operator/simulated_data_chart'); ?>
  </fieldset>

  <fieldset id="sf_fieldset_market_share_evolution">
    <h2>Market Share Evolution</h2>
    <?php include_partial('operator/market_share_evolution_chart', array('ajaxUrl' => url_for('scenario/getMarketShareEvolutionData?id='.$operator->scenario_id), 'tickAlias' => $operator->Scenario->getTickAlias())); ?>
  </fieldset>
</div>
