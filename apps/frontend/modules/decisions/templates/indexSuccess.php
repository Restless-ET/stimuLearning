<h1>Decision points List</h1>

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
    <?php foreach ($decision_points as $decision_point): ?>
    <tr>
      <td><a href="<?php echo url_for('decisions/edit?id='.$decision_point->getId()) ?>"><?php echo $decision_point->getId() ?></a></td>
      <td><?php echo $decision_point->getTick() ?></td>
      <td><?php echo $decision_point->getOperatorId() ?></td>
      <td><?php echo $decision_point->getScenarioId() ?></td>
      <td><?php echo $decision_point->getCreatedAt() ?></td>
      <td><?php echo $decision_point->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('decisions/new') ?>">New</a>
