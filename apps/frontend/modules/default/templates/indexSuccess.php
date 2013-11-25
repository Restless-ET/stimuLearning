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
<?php else: ?>
<h2>Welcome!!</h2>
<div id="access_login" style="text-align: right;">
  <a style="font-size: 16px; padding: 0.8em 2em; margin-right: 35px; float: none;" class="fg-button ui-state-default ui-corner-all" href="<?php echo url_for('@login'); ?>">Login</a><br />
  <br />
  <br />Not registered yet? <a href="<?php echo url_for('user/new'); ?>">Click here</a>.
</div>
<?php endif; ?>
<br />
<hr>
<div id="screenshot" style="float: right;"><?php echo image_tag('operator_data.png', array('style' => 'width: 550px;')) ?></div>
<p>This application is an educational tool that combines telecommunications engineering and economics:<br />
- It helps to understand the relations between engineering decisions and the economics of telecommunications businesses.<br />
- It helps to understand the relations between market dynamics and technological choices.<br />
<br />
The structure of this tool is depicted in the following figure:<br />
<br />
Imagem<br />
<br />
The tool can be used in two basic contexts:<br />
- To study the implications between technologies, architectures, deployment plans, etc on the associated business cases.<br />
- To study the implications between competition and telecommunication engineering design options.</p>
