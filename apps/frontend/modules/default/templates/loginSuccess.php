<div class="sf_admin_flashes ui-widget">
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice ui-state-highlight ui-corner-all">
    <span class="ui-icon ui-icon-info floatleft"></span>&nbsp;
    <?php echo $sf_user->getFlash('notice'); ?>
  </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error ui-state-error ui-corner-all">
    <span class="ui-icon ui-icon-alert floatleft"></span>&nbsp;
    <?php echo $sf_user->getFlash('error'); ?>
  </div>
<?php endif; ?>
</div>

<fieldset style="border: solid 1px black;">
  <legend style="margin-left: 10px;">&nbsp;Access Credentials&nbsp;</legend>
  <form action="<?php echo url_for('@login') ?>" method="POST" style="margin-left: 10px;">
    <table style="margin-top: 0.5em;">
        <?php echo $form ?>
      <tr>
        <td colspan="2">
          <input class="fg-button ui-state-default ui-corner-all" type="submit" value="Log On"/>
        </td>
      </tr>
    </table>
  </form>
</fieldset>
