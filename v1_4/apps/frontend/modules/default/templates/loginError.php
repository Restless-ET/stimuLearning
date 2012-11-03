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
<font color="red">
Invalid authentication!
</font>