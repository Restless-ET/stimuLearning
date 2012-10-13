<h1>Operators List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Starting market size</th>
      <th>User</th>
      <th>Scenario</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($operators as $operator): ?>
    <tr>
      <td><a href="<?php echo url_for('operator/edit?id='.$operator->getId()) ?>"><?php echo $operator->getId() ?></a></td>
      <td><?php echo $operator->getStartingMarketSize() ?></td>
      <td><?php echo $operator->getUserId() ?></td>
      <td><?php echo $operator->getScenarioId() ?></td>
      <td><?php echo $operator->getCreatedAt() ?></td>
      <td><?php echo $operator->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('operator/new') ?>">New</a>
