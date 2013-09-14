<?php

/**
 * Scenario
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    stimuLearning
 * @subpackage model
 * @author     Artur Melo <adsmelo@ua.pt>
 */
class Scenario extends BaseScenario
{
    /**
     * Takes the necessary steps to initialize all data regarding the simulation starting point (time=0)
     *
     * @return true on success, error message otherwise
     */
    public function initializeSimulation()
    {
        $msg = true;
        // validate that this scenario has operators
        if (!count($this->Operators)) {
            $msg = 'This scenario has no associated operators!';
        }

        // validate that services exists for all operators
        foreach ($this->Operators as $operator) {
            if (!count($operator->Services)) {
                $msg = 'One or more of the Operators does not have any Service registered yet!';
                break;
            }
            $opTick = new Tick();
            $opTick->setNbr($this['current_tick']);
            $opTick->setOperator($operator);
            $opTick->setScenario($this);
            $opTick->save();

            $totalClients = $operator['starting_market_size'];
            $clientsDiff = $totalClients - 0; // Equal values on initialization
            $capex = 0.00;
            $opex = 0.00;
            $revenue = 0.00;

            foreach ($operator['Services'] as $service) {
                $tech = $service['Technology'];
                $clients = round($service['clients_quota'] / 100 * $totalClients);
                if ($tech['first_tick_available'] == $this['current_tick']) { // Equals 0
                    $equipments = Doctrine_Core::getTable('Equipment')->createQuery('e')
                                      ->where('e.architecture_id = ?', $tech['Architecture']['id'])
                                      ->orderBy('e.network_level ASC')
                                      ->fetchArray();
                    foreach ($equipments as $equipment) {
                        $targetTotal = ceil($clients / $equipment['maximum_clients']);
                        $currentTotal = 0; // Because this is the initialization

                        $acquired = new AcquiredEquipment();
                        $acquired->setQuantity($targetTotal - $currentTotal);
                        $acquired->setPrice($equipment['starting_price']); // Just for indication really
                        $acquired->setAvailableUntil($this['current_tick'] + $equipment['life_expectation']);
                        $acquired->setEquipmentId($equipment['id']);
                        $acquired->setTick($opTick);
                        $acquired->save();

                        $capex -= ($targetTotal - $currentTotal) * $equipment['starting_price'];

                    }
                    if ($clientsDiff > 0) {
                        $newClients = round($service['clients_quota'] / 100 * $clientsDiff);
                        $opex -= $newClients * $service['setup_fee']; //OPEX or CAPEX??
                    }
                    $opex -= $clients * $service['cost_per_user'];
                    $revenue += $clients * $service['periodic_fee'];
                }
            }
            //Update the remaining details of a Tick
            $opTick->setCAPEX($capex);
            $opTick->setOPEX($opex);
            $opTick->setRevenue($revenue);
            $cashflow = $capex + $opex + $revenue;
            $opTick->setCashflow($cashflow);
            $balance = $operator['balance'] + $cashflow;
            $opTick->setBalance($balance);
            $opTick->setEquity($balance * 0.5); // ????!?!
            $opTick->save();

            $operator->setCurrentMarketSize($totalClients);
            $operator->setBalance($balance);
            $operator->save();
        }

        //TODO Init a market tick

        if ($msg === true) {
            // Change scenario to started
            $this->setStarted(true);
            $this->save();
        }

        return $msg;
    }

    /**
     * Advances the scenario simulation to the next step.
     *
     * @return void
     */
    public function advanceToNextStep()
    {
        $this['current_tick'] += 1;
        if ($this['current_tick'] == $this['lifespan']) {
            $this->setFinished(true);
        }

        foreach ($this['Operators'] as $operator) {
            //TODO Determine the how many clients have arrived/left for the operator
            $clientsDiff = rand(3000, 6000);

            $opTick = new Tick();
            $opTick->setNbr($this['current_tick']);
            $opTick->setOperator($operator);
            $opTick->setScenario($this);
            $opTick->save();

            $totalClients = $operator['current_market_size'] + $clientsDiff;
            $capex = 0.00;
            $opex = 0.00;
            $revenue = 0.00;

            foreach ($operator['Services'] as $service) {
                $tech = $service['Technology'];
                $clients = round($service['clients_quota'] / 100 * $totalClients);
                if ($this['current_tick'] >= $tech['first_tick_available']) {
                    $equipments = Doctrine_Core::getTable('Equipment')->createQuery('e')
                                      ->where('e.architecture_id = ?', $tech['Architecture']['id'])
                                      ->orderBy('e.network_level ASC')
                                      ->fetchArray();
                    foreach ($equipments as $equipment) {
                        //TODO Mark obsolete equipments
                        $targetTotal = ceil($clients / $equipment['maximum_clients']);
                        $currentTotal = ceil($targetTotal * 0.7); // TODO Determine current amount of equipments

                        $acquired = new AcquiredEquipment();
                        $acquired->setQuantity($targetTotal - $currentTotal);
                        $acquired->setPrice($equipment['starting_price'] * (1 - 0.02 * $this['current_tick'])); //TODO Calculate price depreciation
                        $acquired->setAvailableUntil($this['current_tick'] + $equipment['life_expectation']);
                        $acquired->setEquipmentId($equipment['id']);
                        $acquired->setTick($opTick);
                        $acquired->save();

                        $capex -= ($targetTotal - $currentTotal) * $equipment['starting_price'];

                    }
                    if ($clientsDiff > 0) {
                        $newClients = round($service['clients_quota'] / 100 * $clientsDiff);
                        $opex -= $newClients * $service['setup_fee']; //OPEX or CAPEX??
                    }
                    $opex -= $clients * $service['cost_per_user'];
                    $revenue += $clients * $service['periodic_fee'];
                }
            }
            //Update the remaining details of a Tick
            $opTick->setCAPEX($capex);
            $opTick->setOPEX($opex);
            $opTick->setRevenue($revenue);
            $cashflow = $capex + $opex + $revenue;
            $opTick->setCashflow($cashflow);
            $balance = $operator['balance'] + $cashflow;
            $opTick->setBalance($balance);
            $opTick->setEquity($balance * 0.5); // ????!?!
            $opTick->save();

            $operator->setCurrentMarketSize($totalClients);
            $operator->setBalance($balance);
            $operator->save();
        }

        //TODO A new market tick??


        $this->save();
    }
}
