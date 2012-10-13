<h1>Equipments List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Starting price</th>
      <th>Number of ports</th>
      <th>Network level</th>
      <th>Life expectation</th>
      <th>Equipment type</th>
      <th>Nature or purpose</th>
      <th>Tecnology age</th>
      <th>Setup speed</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($equipments as $equipment): ?>
    <tr>
      <td><a href="<?php echo url_for('equipment/edit?id='.$equipment->getId()) ?>"><?php echo $equipment->getId() ?></a></td>
      <td><?php echo $equipment->getName() ?></td>
      <td><?php echo $equipment->getStartingPrice() ?></td>
      <td><?php echo $equipment->getNumberOfPorts() ?></td>
      <td><?php echo $equipment->getNetworkLevel() ?></td>
      <td><?php echo $equipment->getLifeExpectation() ?></td>
      <td><?php echo $equipment->getEquipmentType() ?></td>
      <td><?php echo $equipment->getNatureOrPurpose() ?></td>
      <td><?php echo $equipment->getTecnologyAge() ?></td>
      <td><?php echo $equipment->getSetupSpeed() ?></td>
      <td><?php echo $equipment->getCreatedAt() ?></td>
      <td><?php echo $equipment->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('equipment/new') ?>">New</a>
