<?php if($sf_user->getFlash('created')): ?>
<font color="green">Conta criada com sucesso! Aguarde a validação da sua conta para poder aceder ao sistema.</font><br />
<?php endif; ?>
<fieldset>
  <legend>Access Credentials</legend>
  <form action="<?php echo url_for('@login') ?>" method="POST">
    <table style="border-spacing: 0px;">
        <?php echo $form ?>
      <tr>
        <td colspan="2">
          <input type="submit" value="Log On"/>
        </td>
      </tr>
    </table>
  </form>
</fieldset>
