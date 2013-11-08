<?php if ($sf_user->isAuthenticated()): ?>
<h2>Welcome, <?php echo $sf_user->getAttribute('username') ?>!!</h2>

  <h3>My Scenarios</h3>
  <?php if (isset($myScenarios) && count($myScenarios)) :?>
    <ul>
    <?php foreach ($myScenarios as $scenario): ?>
      <li>
        <a class="fg-button ui-state-default" href="<?php echo url_for('scenario/show?id='.$scenario['id']); ?>">
          <?php echo $scenario['description'];?></a>
      </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <br/>
  <h3>My Operators</h3>
  <?php if (isset($myOperators) && count($myOperators)) :?>
    <ul>
    <?php foreach ($myOperators as $operator): ?>
      <li>
        <a class="fg-button ui-state-default" href="<?php echo url_for('operator/show?id='.$operator['id']); ?>">
          <?php echo $operator['name'];?></a>
      </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
<?php else: ?>
<h2>Welcome!!</h2>

<a href="<?php echo url_for('@login'); ?>">Login</a>
<?php endif; ?>
<br /><br />
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
