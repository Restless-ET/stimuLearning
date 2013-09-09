<h1>Services List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tick</th>
      <th>Operator</th>
      <th>Scenario</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($services as $service): ?>
    <tr>
      <td><a href="<?php echo url_for('service/edit?id='.$service->getId()) ?>"><?php echo $service->getId() ?></a></td>
      <td><?php echo $service->getTick() ?></td>
      <td><?php echo $service->getOperatorId() ?></td>
      <td><?php echo $service->getScenarioId() ?></td>
      <td><?php echo $service->getCreatedAt() ?></td>
      <td><?php echo $service->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('service/new') ?>">New</a>
