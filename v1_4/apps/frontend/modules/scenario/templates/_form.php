<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('scenario/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('scenario/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'scenario/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['simulation_status']->renderLabel() ?></th>
        <td>
          <?php echo $form['simulation_status']->renderError() ?>
          <?php echo $form['simulation_status'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['market_clients_total']->renderLabel() ?></th>
        <td>
          <?php echo $form['market_clients_total']->renderError() ?>
          <?php echo $form['market_clients_total'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tick_alias']->renderLabel() ?></th>
        <td>
          <?php echo $form['tick_alias']->renderError() ?>
          <?php echo $form['tick_alias'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['simulation_lifespan']->renderLabel() ?></th>
        <td>
          <?php echo $form['simulation_lifespan']->renderError() ?>
          <?php echo $form['simulation_lifespan'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['decision_points']->renderLabel() ?></th>
        <td>
          <?php echo $form['decision_points']->renderError() ?>
          <?php echo $form['decision_points'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ticks_between_decision_points']->renderLabel() ?></th>
        <td>
          <?php echo $form['ticks_between_decision_points']->renderError() ?>
          <?php echo $form['ticks_between_decision_points'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['time_between_ticks']->renderLabel() ?></th>
        <td>
          <?php echo $form['time_between_ticks']->renderError() ?>
          <?php echo $form['time_between_ticks'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tariffs_erosion_rate']->renderLabel() ?></th>
        <td>
          <?php echo $form['tariffs_erosion_rate']->renderError() ?>
          <?php echo $form['tariffs_erosion_rate'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depreciation_rate']->renderLabel() ?></th>
        <td>
          <?php echo $form['depreciation_rate']->renderError() ?>
          <?php echo $form['depreciation_rate'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['interest_rate']->renderLabel() ?></th>
        <td>
          <?php echo $form['interest_rate']->renderError() ?>
          <?php echo $form['interest_rate'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['elasticity']->renderLabel() ?></th>
        <td>
          <?php echo $form['elasticity']->renderError() ?>
          <?php echo $form['elasticity'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['bankrupcy_limit']->renderLabel() ?></th>
        <td>
          <?php echo $form['bankrupcy_limit']->renderError() ?>
          <?php echo $form['bankrupcy_limit'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['starting_level']->renderLabel() ?></th>
        <td>
          <?php echo $form['starting_level']->renderError() ?>
          <?php echo $form['starting_level'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['saturation_level']->renderLabel() ?></th>
        <td>
          <?php echo $form['saturation_level']->renderError() ?>
          <?php echo $form['saturation_level'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['alpha']->renderLabel() ?></th>
        <td>
          <?php echo $form['alpha']->renderError() ?>
          <?php echo $form['alpha'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['beta']->renderLabel() ?></th>
        <td>
          <?php echo $form['beta']->renderError() ?>
          <?php echo $form['beta'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['number_of_services_weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['number_of_services_weight']->renderError() ?>
          <?php echo $form['number_of_services_weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['download_weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['download_weight']->renderError() ?>
          <?php echo $form['download_weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['upload_weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['upload_weight']->renderError() ?>
          <?php echo $form['upload_weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rate_weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['rate_weight']->renderError() ?>
          <?php echo $form['rate_weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fee_weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['fee_weight']->renderError() ?>
          <?php echo $form['fee_weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['occupation_rate_weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['occupation_rate_weight']->renderError() ?>
          <?php echo $form['occupation_rate_weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['containment_factor_weight']->renderLabel() ?></th>
        <td>
          <?php echo $form['containment_factor_weight']->renderError() ?>
          <?php echo $form['containment_factor_weight'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['reference_occupation_rate']->renderLabel() ?></th>
        <td>
          <?php echo $form['reference_occupation_rate']->renderError() ?>
          <?php echo $form['reference_occupation_rate'] ?>
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
