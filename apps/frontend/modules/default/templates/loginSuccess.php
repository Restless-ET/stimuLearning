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
<div style="float:left">
  <div id="market_share_chart" style="width: 500px; height: 300px;"></div>
</div>

<div id="miniature" style="float:left;margin-left:20px">
  <div id="overview" style="width:166px;height:100px"></div>

  <p id="overviewLegend" style="margin-left:10px"></p>
</div>

<p id="hoverdata">Mouse hovers at
(<span id="x">0</span>, <span id="y">0</span>). <span id="clickdata"></span></p>

