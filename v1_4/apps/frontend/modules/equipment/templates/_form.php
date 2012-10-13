<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('equipment/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('equipment/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'equipment/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['starting_price']->renderLabel() ?></th>
        <td>
          <?php echo $form['starting_price']->renderError() ?>
          <?php echo $form['starting_price'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['number_of_ports']->renderLabel() ?></th>
        <td>
          <?php echo $form['number_of_ports']->renderError() ?>
          <?php echo $form['number_of_ports'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['network_level']->renderLabel() ?></th>
        <td>
          <?php echo $form['network_level']->renderError() ?>
          <?php echo $form['network_level'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['life_expectation']->renderLabel() ?></th>
        <td>
          <?php echo $form['life_expectation']->renderError() ?>
          <?php echo $form['life_expectation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['equipment_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['equipment_type']->renderError() ?>
          <?php echo $form['equipment_type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nature_or_purpose']->renderLabel() ?></th>
        <td>
          <?php echo $form['nature_or_purpose']->renderError() ?>
          <?php echo $form['nature_or_purpose'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tecnology_age']->renderLabel() ?></th>
        <td>
          <?php echo $form['tecnology_age']->renderError() ?>
          <?php echo $form['tecnology_age'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['setup_speed']->renderLabel() ?></th>
        <td>
          <?php echo $form['setup_speed']->renderError() ?>
          <?php echo $form['setup_speed'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
