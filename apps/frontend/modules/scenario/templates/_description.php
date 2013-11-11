<a href="<?php echo ($sf_user->getAttribute('id') == $scenario->responsible_id && !$scenario->started && !$scenario->finished) ?
 url_for('scenario/edit?id='.$scenario->id) : url_for('scenario/show?id='.$scenario->id) ?>">
<?php echo $scenario->getDescription(); ?></a>
