<h1>Scenarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Description</th>
      <th>Simulation status</th>
      <th>Market clients total</th>
      <th>Tick alias</th>
      <th>Simulation lifespan</th>
      <th>Decision points</th>
      <th>Ticks between decision points</th>
      <th>Time between ticks</th>
      <th>Tariffs erosion rate</th>
      <th>Depreciation rate</th>
      <th>Interest rate</th>
      <th>Elasticity</th>
      <th>Bankrupcy limit</th>
      <th>Starting level</th>
      <th>Saturation level</th>
      <th>Alpha</th>
      <th>Beta</th>
      <th>Number of services weight</th>
      <th>Download weight</th>
      <th>Upload weight</th>
      <th>Rate weight</th>
      <th>Fee weight</th>
      <th>Occupation rate weight</th>
      <th>Containment factor weight</th>
      <th>Reference occupation rate</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($scenarios as $scenario): ?>
    <tr>
      <td><a href="<?php echo url_for('scenario/edit?id='.$scenario->getId()) ?>"><?php echo $scenario->getId() ?></a></td>
      <td><?php echo $scenario->getDescription() ?></td>
      <td><?php echo $scenario->getSimulationStatus() ?></td>
      <td><?php echo $scenario->getMarketClientsTotal() ?></td>
      <td><?php echo $scenario->getTickAlias() ?></td>
      <td><?php echo $scenario->getSimulationLifespan() ?></td>
      <td><?php echo $scenario->getDecisionPoints() ?></td>
      <td><?php echo $scenario->getTicksBetweenDecisionPoints() ?></td>
      <td><?php echo $scenario->getTimeBetweenTicks() ?></td>
      <td><?php echo $scenario->getTariffsErosionRate() ?></td>
      <td><?php echo $scenario->getDepreciationRate() ?></td>
      <td><?php echo $scenario->getInterestRate() ?></td>
      <td><?php echo $scenario->getElasticity() ?></td>
      <td><?php echo $scenario->getBankrupcyLimit() ?></td>
      <td><?php echo $scenario->getStartingLevel() ?></td>
      <td><?php echo $scenario->getSaturationLevel() ?></td>
      <td><?php echo $scenario->getAlpha() ?></td>
      <td><?php echo $scenario->getBeta() ?></td>
      <td><?php echo $scenario->getNumberOfServicesWeight() ?></td>
      <td><?php echo $scenario->getDownloadWeight() ?></td>
      <td><?php echo $scenario->getUploadWeight() ?></td>
      <td><?php echo $scenario->getRateWeight() ?></td>
      <td><?php echo $scenario->getFeeWeight() ?></td>
      <td><?php echo $scenario->getOccupationRateWeight() ?></td>
      <td><?php echo $scenario->getContainmentFactorWeight() ?></td>
      <td><?php echo $scenario->getReferenceOccupationRate() ?></td>
      <td><?php echo $scenario->getCreatedAt() ?></td>
      <td><?php echo $scenario->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('scenario/new') ?>">New</a>
