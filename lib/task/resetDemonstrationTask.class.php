<?php

/**
 * Class Reset Demonstration Task
 *
 * This task will clean all data related with demonstration user
 *  and re-import all the demonstration base data.
 *
 * @package    stimuLearning
 * @subpackage task
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class resetDemonstrationTask extends sfBaseTask
{
  /**
   * Configures the current task.
   *
   * @return nothing
   */
  protected function configure()
  {
    // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
    new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend'),
    new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
    new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
    // add your own options here
    ));

    $this->namespace        = 'gsbl';
    $this->name             = 'resetDemonstration';
    $this->briefDescription = 'Reset all data from demonstration account';
    $this->detailedDescription = <<<EOF
The [gsbl:resetDemonstration|INFO] task does things.
Call it with:

  [php symfony gsbl:resetDemonstration|INFO]
EOF;
  }

  /**
   * Method that runs the current task
   *
   * @param array $arguments Array with optional arguments for this task
   * @param array $options   Array with options to apply to/by this task
   *
   * @return nothing
   */
  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $databaseManager->getDatabase($options['connection'])->getConnection();

    $user = Doctrine_Core::getTable('User')->createQuery('u')
                  ->where('u.username = ?', 'demonstration')
                  ->fetchOne();
    if ($user == false) {
        return; //TODO This should notify an admin as it's possibly an undesired situation
    }
    $lastLogin = $user->getLastLogin();
    if (!$lastLogin) {
        return; // This will avoid unnecessary cleaning.
    } else {
        $now = date('Y-m-d H:i:s');
        $hoursElapsed = DateTimeHelper::dateTimeDiff($lastLogin, $now, 'Hours');
        if ($hoursElapsed > 24.00) {
            return; // This will avoid unnecessary cleaning.
        }
    }

    ################################## CLEAN UP ###################################
    $scenarios = Doctrine_Core::getTable('Scenario')->createQuery('s')
                    ->where('s.responsible_id = ?', $user->getId())
                    ->execute();

    foreach ($scenarios as $oldScenario) {
        // Just ordering the removal of the scenario should be enough.
        // The configured MySQL cascade deletes should take care of everything else automatically
        $oldScenario->delete();
    }

    ############################### RE-INSERT DATA ################################
    ### When updating this values you should update the corresponding fixture files as well

    // Start with the scenario details
    $scenario = new Scenario();
    $scenario->setDescription('Simple Economic Exercise');
    $totalClients = 15000;
    $scenario->setTotalClients($totalClients);
    $scenario->setTickAlias('Year');
    $lifespan = 10;
    $scenario->setLifespan($lifespan);
    $totalDecisionPoints = 0;
    $scenario->setTotalDecisionPoints($totalDecisionPoints);
    $scenario->setTicksBetweenDecisionPoints($lifespan / ($totalDecisionPoints + 1));
    $scenario->setStartingLevel(10);
    $scenario->setSaturationLevel(70);
    $scenario->setAlpha(900);
    $scenario->setBeta(-1.5);
    $scenario->setDenseUrbanPopulation($totalClients / 4);
    $scenario->setUrbanPopulation($totalClients / 4);
    $scenario->setSuburbanPopulation($totalClients / 4);
    $scenario->setRuralPopulation($totalClients / 4);
    $scenario->setPackagesErosionRate(5);
    $scenario->setDepreciationRate(10);
    $scenario->setInterestRate(10);
    $scenario->setElasticity('1.0');
    $scenario->setBankrupcyLimit(rand(1, 100));
    $scenario->setResponsible($user);
    $scenario->save();

    // The operator
    $operator = new Operator();
    $operator->setName('Portugal Telecom');
    $operator->setStartingMarketSize(1500);
    $operator->setMarketShare(100);
    $operator->setUser($user);
    $operator->setScenario($scenario);
    $operator->save();

    // Next the network details, starting by the technology
    $technology = new Technology();
    $technology->setName('FTTH');
    $technology->setDescription('Fiber To The Home');
    $technology->setDeclineA(rand(100, 300));
    $technology->setDeclineB((500 - rand(0, 500)) / 100);
    $technology->setOperator($operator);
    $technology->setScenario($scenario);
    $technology->save();

    // The related architecture
    $architecture = new Architecture();
    $architecture->setName('FTTX');
    $architecture->setDownloadBandwidth(pow(2, rand(0, 6)));
    $architecture->setUploadBandwidth(pow(2, rand(8, 12)));
    $architecture->setTechnology($technology);
    $architecture->save();

    // And the needed equipments for it
    $equipment0 = new Equipment();
    $equipment0->setName('Base');
    $equipment0->setStartingPrice(1000000);
    $equipment0->setNumberOfPorts(32);
    $equipment0->setNetworkLevel(0);
    $equipment0->setLifeExpectation(20);
    $equipment0->setEquipmentType('Wired');
    $equipment0->setNatureOrPurpose('Electronics (0.9)');
    $equipment0->setTecnologyAge('Emerging (0.001)');
    $equipment0->setSetupSpeed('Very slow (40)');
    $equipment0->setMaximumClients(2048);
    $equipment0->setArchitecture($architecture);
    $equipment0->save();

    $equipment1 = new Equipment();
    $equipment1->setName('Intermediate');
    $equipment1->setStartingPrice(30000);
    $equipment1->setNumberOfPorts(64);
    $equipment1->setNetworkLevel(1);
    $equipment1->setLifeExpectation(20);
    $equipment1->setEquipmentType('Wired');
    $equipment1->setNatureOrPurpose('Fiber cables (0.8)');
    $equipment1->setTecnologyAge('Emerging (0.001)');
    $equipment1->setSetupSpeed('Very slow (40)');
    $equipment1->setMaximumClients(64);
    $equipment1->setArchitecture($architecture);
    $equipment1->save();

    $equipment2 = new Equipment();
    $equipment2->setName('Terminal');
    $equipment2->setStartingPrice(20);
    $equipment2->setNumberOfPorts(1);
    $equipment2->setNetworkLevel(2);
    $equipment2->setLifeExpectation(20);
    $equipment2->setEquipmentType('Wired');
    $equipment2->setNatureOrPurpose('Passive Optical Components (0.8)');
    $equipment2->setTecnologyAge('Emerging (0.001)');
    $equipment2->setSetupSpeed('Very slow (40)');
    $equipment2->setMaximumClients(1);
    $equipment2->setArchitecture($architecture);
    $equipment2->save();

    // And finally the operator service(s)
    $service = new Service();
    $service->setName('Triple-play');
    $service->setNumberOfServices(3);
    $service->setSetupFee(0);
    $service->setCostPerUser(120);
    $service->setCAPEXPercentage(10);
    $service->setMonthlyFee(45);
    $service->setClientsQuota(100);
    $service->setTechnology($technology);
    $service->save();
  }
}
