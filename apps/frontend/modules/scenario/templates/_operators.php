<?php use_helper('JavascriptBase'); ?>
<?php $loggedUser = $sf_user->getAttribute('id');
      $operators = $scenario->Operators; ?>

<?php if(count($operators) > 0): ?>
  <div class="sf_form_row">
    <table id="operators_table" class="support-table">
      <thead>
        <tr>
          <th>Operator</th>
          <th><?php echo $scenario->started ? 'Current' : 'Starting'?> market size</th>
          <th>Market Share</th>
          <th>User (Controller)</th>
          <th>Created At</th>
        <?php if (!$scenario->started): ?>
          <?php if ($loggedUser == $scenario->responsible_id || $sf_user->hasCredential('admin')): ?>
            <th></th>
          <?php endif; ?>
        <?php endif; ?>
        </tr>
      </thead>
      <tbody>
      <?php foreach($operators as $op): ?>
        <tr>
          <td><?php echo link_to(ImagesHelper::jQueryUIImageTag('search', 'alt_title=Show').$op['name'], 'operator/show?id='.$op->id); ?></td>
          <td><?php echo $scenario->started ? number_format($op['current_market_size'], 0, ',', '.') : number_format($op['starting_market_size'], 0, ',', '.'); ?></td>
          <td><?php echo NumbersHelper::taxes($op['market_share'], 2).' %'; ?></td>
          <td><?php echo $op->getUser(); ?></td>
          <td><?php echo DateTimeHelper::dateFormatWithTime($op->getCreatedAt()); ?></td>
        <?php if (!$scenario->started): ?>
          <?php if($loggedUser == $scenario->responsible_id || $sf_user->hasCredential('admin')): ?>
            <td class="options">
              <?php echo link_to(ImagesHelper::jQueryUIImageTag('pencil', 'alt_title=Edit'), 'operator/edit?id='.$op->id); ?>
            </td>
          <?php endif; ?>
        <?php endif; ?>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div class="content" style="font-style: italic; color: #996600; text-align: center;">
    No operators have been created for this scenario yet!
  </div>
<?php endif; ?>

<?php if (!$scenario->started && ($loggedUser == $scenario->responsible_id || $sf_user->hasCredential('admin'))): ?>
  <br/>
  <?php echo link_to(ImagesHelper::jQueryUIImageTag('plus', 'alt_title=New Operator').' New Operator', 'operator/new', array('class' => 'fg-button ui-state-default ui-corner-all fg-button-icon-left')); ?>
<?php endif; ?>

<?php if(count($operators) > 1): ?>
  <br/>
  <br/>
  <hr>
  <h1>Weights for Quality Vector</h1>
<?php endif; ?>

<script type="text/javascript">
$(document).ready(function(){
    var tabElement = 'a[href="#sf_fieldset_operators"]',
        objectToCount = '#operators_table tbody tr';

    if ($(tabElement + ' .counter').length) {
        $(tabElement + ' .counter').text(' (' + $(objectToCount).length + ')');
    } else {
        $(tabElement).append('<span class="counter"> (' + $(objectToCount).length + ')</span>');
    }

    // Take vantage of this to call the methods from calculos.js on document ready
    setGeographyAreas();
    setDemographyPopulation();
});
</script>
