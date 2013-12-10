<?php if ($sf_user->isAuthenticated()): ?>
  <h2>Welcome, <?php echo $sf_user->getAttribute('username') ?>!!</h2>
  <div class="help">
    <span class="ui-icon ui-icon-info" style="float: left;"></span>Only scenarios with an unfinished simulation are shown below...
  </div>
  <h3>My Scenarios<?php //echo link_to('My Scenarios', '@scenario')?></h3>

  <?php if (isset($myScenarios) && count($myScenarios)) :?>
    <ul>
    <?php foreach ($myScenarios as $scenario): ?>
      <li style="display: inline;">
        <a class="fg-button ui-state-default ui-corner-all" href="<?php echo url_for('scenario/show?id='.$scenario['id']); ?>">
          <?php echo $scenario['description'];?></a>
      </li>
    <?php endforeach; ?>
    </ul>
    <br/>
    <br/>
  <?php endif; ?>
  <a style="color: #00850F; text-decoration: none;" href="<?php echo url_for('scenario/new'); ?>">Create new scenario...</a>
  <br/>
  <br/>
  <h3>Player Scenarios</h3>
  <?php if (isset($playerScenarios) && count($playerScenarios)) :?>
    <ul>
    <?php foreach ($playerScenarios as $pScenario): ?>
      <li style="display: inline;">
        <a class="fg-button ui-state-default ui-corner-all" href="<?php echo url_for('scenario/show?id='.$pScenario['id']); ?>">
          <?php echo $pScenario['description'];?></a>
      </li>
    <?php endforeach; ?>
    </ul>
    <br/>
  <?php endif; ?>
  <br />
<?php else: ?>
<h2>Welcome!!</h2>
<table style="width: 100%; margin-bottom: 0px;">
  <tr>
    <td style="width: 33%;">
      <div id="access_demo" style="text-align: center;">
        <a style="font-size: 20px; padding: 0.8em 2em; float: none;" class="fg-button ui-state-default ui-corner-all" href="<?php echo url_for('default/login?demo=true'); ?>">Try now!</a>
        <br /><br />
        <p>Not registered yet? <a href="<?php echo url_for('user/new'); ?>">Click here</a>.</p>
      </div>
    </td>
    <td style="width: 33%;"></td>
    <td style="vertical-align: top;">
      <div id="access_login" style="text-align: center;">
        <a style="font-size: 15px; padding: 0.7em 1.7em; float: none;" class="fg-button ui-state-default ui-corner-all" href="<?php echo url_for('@login'); ?>">Login</a>
      </div>
    </td>
  </tr>
</table>
<?php endif; ?>
<hr>
<div id="screenshot" style="float: right;"><?php echo image_tag('operator_data.png', array('style' => 'width: 550px;')) ?></div>
<div id="editable">
  <?php echo html_entity_decode($editableText); ?>
</div>
