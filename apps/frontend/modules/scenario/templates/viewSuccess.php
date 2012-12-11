<?php use_helper('I18N'); ?>

<div id="sf_admin_container">

<?php if ($sf_user->hasCredential('admin')): ?>
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($scenario, array('params' => array(  ), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($scenario, array('params' => array(  ), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
  </ul>
<br /><br />
<?php endif ?>

<input id="lifespan" style="display: none;" type="text" value="<?php echo $scenario->getLifespan(); ?>">
<input id="starting_level" style="display: none;" type="text" value="<?php echo $scenario->getStartingLevel(); ?>">
<input id="saturation_level" style="display: none;" type="text" value="<?php echo $scenario->getSaturationLevel(); ?>">
<input id="alpha" style="display: none;" type="text" value="<?php echo $scenario->getAlpha(); ?>">
<input id="beta" style="display: none;" type="text" value="<?php echo $scenario->getBeta(); ?>">

<div style="float:left">
  <div id="market_share_chart" style="width: 500px; height: 300px;"></div>
</div>

<div id="miniature" style="float:left;margin-left:20px">
  <div id="overview" style="width:166px;height:100px"></div>

  <p id="overviewLegend" style="margin-left:10px"></p>
</div>

<p id="hoverdata">Mouse hovers at
(<span id="x">0</span>, <span id="y">0</span>). <span id="clickdata"></span></p>

</div>
