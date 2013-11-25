<?php $acquired = Doctrine_Core::getTable('AcquiredEquipment')->createQuery('ae')
                            ->innerJoin('ae.Tick t')
                            ->innerJoin('ae.Equipment e')
                            ->innerJoin('e.Architecture arch')
                            ->innerJoin('arch.Technology tech')
                            ->select('ae.*, t.nbr, e.name, arch.name, tech.name')
                            ->where('t.operator_id = ?', $operator['id'])
                            ->orderBy('t.nbr ASC')
                            ->addOrderBy('e.network_level ASC')
                            ->execute(); ?>

<?php if(count($acquired) > 0): ?>
  <?php $tickAlias = $operator->getScenario()->getTickAlias(); ?>
  <div class="sf_form_row">
    <table id="acquired_equipments_table" class="support-table">
      <thead>
        <tr>
          <th><?php echo $tickAlias; ?> #</th>
          <th>Equipment</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Available until</th>
          <th>Technology / Architecture</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($acquired as $equip): ?>
        <tr>
          <td><?php echo $equip['Tick']['nbr']; ?></td>
          <td><?php echo link_to(ImagesHelper::jQueryUIImageTag('search', 'alt_title=Show').$equip['Equipment']['name'], 'equipment/show?id='.$equip->id); ?></td>
          <td><?php echo $equip['quantity']; ?></td>
          <td><?php echo NumbersHelper::currency($equip['price'], 'left'); ?></td>
          <td><?php echo strtolower($tickAlias).' '.$equip['available_until']; ?></td>
          <td><?php echo $equip['Equipment']['Architecture']['Technology']['name'].' / '.$equip['Equipment']['Architecture']['name']; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div class="content" style="font-style: italic; color: #996600; text-align: center;">
    The simulation hasn't started yet, no equipments were acquired by this operator.
  </div>
<?php endif; ?>
