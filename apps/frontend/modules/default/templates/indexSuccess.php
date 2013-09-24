<?php if ($sf_user->isAuthenticated()): ?>
<h2>Welcome, <?php echo $sf_user->getAttribute('username') ?>!!</h2>
<br /><br />
<p>This page is still under construction!!</p>
<br /><br />
<a href="<?php echo url_for('@operator'); ?>">Go to my Operators</a>

<?php else: ?>
<h2>Welcome!!</h2>

<a href="<?php echo url_for('@login'); ?>">Login</a>
<br /><br />
<p>This application is a user-friendly educational tool intended to reflect the market dynamics on the telecom industry.</p>
<p>This tool is aimed to help telecom engineering students to learn how the technical decisions affect the ecnonomical outcomes, on telecom business models.</p>
<p>The development of this tool is based on years of real-world analysis on telecom business models and their influences on the engineering decisions of a telecom operator.</p><br />
<p style="width:45%; float: left;">After years of mathematical model development, we reached the model ilustrated on the right. <br /><br />
 We may say that the market is the main block of this tool.<br /><br />
 This application takes, as input, the decisions of the telecom operators, the actors. <br /><br />
 After processing these inputs, the system outputs the economic outcomes of each player.<br /><br />
 These outcomes can be affected by some parameters which model the behaviour of the market.</p>
<?php endif; ?>
