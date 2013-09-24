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
  <font color="red">
  Invalid authentication!
  </font>
</fieldset>
