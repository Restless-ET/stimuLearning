<div id="market_share_chart"></div>

<div id="miniature">
  <p id="overviewLegend"></p>
  <div id="overview"></div>

  <p id="hoverdata" style="margin-left:5px"><br><br>Mouse at (<span id="x">0</span>, <span id="y">0</span>)</p>
</div>

<?php if (isset($scenario)): ?>
  <input id="scenario_tick_alias" style="display: none;" type="text" value="<?php echo $scenario->getTickAlias(); ?>">
  <input id="scenario_lifespan" style="display: none;" type="text" value="<?php echo $scenario->getLifespan(); ?>">
  <input id="scenario_starting_level" style="display: none;" type="text" value="<?php echo $scenario->getStartingLevel(); ?>">
  <input id="scenario_saturation_level" style="display: none;" type="text" value="<?php echo $scenario->getSaturationLevel(); ?>">
  <input id="scenario_alpha" style="display: none;" type="text" value="<?php echo $scenario->getAlpha(); ?>">
  <input id="scenario_beta" style="display: none;" type="text" value="<?php echo $scenario->getBeta(); ?>">
<?php endif; ?>
