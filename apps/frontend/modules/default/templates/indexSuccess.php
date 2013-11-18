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

<a class="fg-button ui-state-default ui-corner-all" href="<?php echo url_for('@login'); ?>">Login</a><br />
<br />
<?php endif; ?>
<br />
<hr>
<div id="screenshot" style="float: right;"><?php echo image_tag('operator_data.png', array('style' => 'width: 550px;')) ?></div>
<p>This application is an educational tool intended to reflect the market dynamics on the telecom industry.<br />
   This tool is aimed to help telecom engineering students to learn how the technical decisions affect the ecnonomical outcomes, on telecom business models.<br />
   The development of this tool is based on years of real-world analysis on telecom business models and their influences on the engineering decisions of a telecom operator.</p>
<br />
<p>We may say that the market is the main block of this tool.<br />
   This application takes, as input, the decisions of the telecom operators, the actors. <br />
   After processing these inputs, the system outputs the economic outcomes of each player.<br />
   These outcomes can be affected by some parameters which model the behaviour of the market.</p>
<br />
<p>The player becomes a telecom operator, which is challenged to reach customers in
    a new region, facing some competition during the process.<br />
   The operator is able to setup subscription packages, to choose the network architecture that
    better suits his offer and to change his options along the simulation time.<br />
   The main goal is to achieve the greater market share in the end of the
    simulation.</p>
