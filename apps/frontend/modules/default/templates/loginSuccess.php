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
