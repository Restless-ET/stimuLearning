<fieldset style="border: solid 1px black;">
  <legend style="margin-left: 10px;">&nbsp;Access Credentials&nbsp;</legend>
  <form action="<?php echo url_for('@login') ?>" method="POST" style="margin-left: 10px;">
    <table style="margin-top: 0.5em;">
        <?php echo $form ?>
      <tr>
        <td colspan="2">
          <input type="submit" value="Log On"/>
        </td>
      </tr>
    </table>
  </form>
</fieldset>
