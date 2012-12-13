<a href="<?php echo $sf_user->hasCredential('admin') ? url_for('scenario/edit?id='.$scenario->id) : url_for('scenario/show?id='.$scenario->id) ?>">
<?php echo $scenario->getDescription(); ?></a>