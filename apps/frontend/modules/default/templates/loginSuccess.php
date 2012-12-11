<?php if($sf_user->getFlash('created')): ?>
<font color="green">Conta criada com sucesso! Aguarde a validação da sua conta para poder aceder ao sistema.</font><br />
<?php endif; ?>

<form action="<?php echo url_for('default/login') ?>" method="POST">
  <table style="border-spacing: 0px;">
      <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="Entrar"/>
      </td>
    </tr>
  </table>
</form>

Solicitar registo de uma nova conta.

<br /><br />
<div id="placeholder" style="width: 500px; height: 300px;"></div>

<p>One of the goals of Flot is to support user interactions. Try
pointing and clicking on the points.</p>

<p id="hoverdata">Mouse hovers at
(<span id="x">0</span>, <span id="y">0</span>). <span id="clickdata"></span></p>

<p>A tooltip is easy to build with a bit of jQuery code and the
data returned from the plot.</p>
