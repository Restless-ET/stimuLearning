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
     * Get the market penetration rate on a given instant
     *
     * @param integer $tick The instant on time in ticks
     *
     * @return the penetration rate for the given tick
     */
    public function getPenetrationRate($tick = 0)
    {
        $num = $this['saturation_level'] - $this['starting_level'];
        $den = 1 + $this['alpha'] * exp($this['beta'] * $tick);

        return ($this['starting_level'] + $num / $den) / 100;
    }

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
        // validate that this scenario has technologies available
        $techsAvailable = count($this->AvailableTechnologies);
        if (!$techsAvailable) {
            $msg = 'This scenario has no available technologies!';
        } elseif ($techsAvailable > 2) { // backend safeguard
            $msg = 'Technology transition on this scenario is only possible to a maximum of two right now!';
        }

        $marketClients = $this['total_clients'] * ($this['starting_level'] / 100);

        // validate that services exists for all operators
        foreach ($this->Operators as $operator) {
            if (!count($operator->Services)) {
                $msg = 'One or more of the Operators does not have any Service registered yet!';
                break;
            }

            $totalClients = $operator['starting_market_size'];
            $totalClients = $marketClients; // TODO calculate for the operator
            $clientsDiff = $totalClients - 0; // Equal values on initialization
            $capex = 0.00;
            $opex = 0.00;
            $revenue = 0.00;

            //TODO Update operator market share
            $operator['market_share'] = 100.00;

            $opTick = new Tick();
            $opTick->setNbr($this['current_tick']);
            $opTick->setMarketShare($operator['market_share']);
            $opTick->setClients($totalClients);
            $opTick->setOperator($operator);
            $opTick->setScenario($this);
            $opTick->save();

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
                        $revenue += $newClients * $service['setup_fee'];
                    }
                    $opex -= $clients * $service['cost_per_user'];
                    $revenue += $clients * $service['periodic_fee'];
                }
            }
            // Some CAPEX percentage as OPEX
            $opex += $capex * ($service['CAPEX_percentage'] / 100); // CAPEX is already negative

            //Update the remaining details of a Tick
            $opTick->setCAPEX($capex);
            $opTick->setOPEX($opex);
            $opTick->setRevenue($revenue);
            $cashflow = $capex + $opex + $revenue;
            $opTick->setCashflow($cashflow);
            $balance = $operator['balance'] + $cashflow;
            $opTick->setBalance($balance);
            $opTick->setEquity($balance - $capex); //TODO CONFIRMAR !!
            $opTick->save();

            $operator->setCurrentMarketSize($totalClients);
            $operator->setBalance($balance);
            $operator->setAccumulatedCAPEX($capex);

            //TODO calculate quality to use on next tick market share determination
            $quality = $operator->getOperatorQuality($this['current_tick']);
            //$operator->setQuality($quality);
            $operator->save();
        }

        //TODO Init a market tick??

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

        $marketPenetration = $this->getPenetrationRate($this['current_tick']);
        $marketClients = $this['total_clients'] * $marketPenetration;

        $techsPenetration = array();
        $singleTech = (count($this['AvailableTechnologies']) == 1) ? true : false;
        $lastPenetr = false;
        foreach ($this['AvailableTechnologies'] as $tech) {
            if ($this['current_tick'] >= $tech['first_tick_available']) {
                if ($singleTech) {
                    $techsPenetration['t'.$tech['id']] = $marketPenetration;
                } elseif ($lastPenetr !== false) {
                    $techsPenetration['t'.$tech['id']] = $marketPenetration - $lastPenetr;
                } else {
                    $techPenetrRatio = 1 + $tech['decline_A'] * exp($tech['decline_B'] * $this['current_tick']);
                    $lastPenetr = $marketPenetration / $techPenetrRatio;
                    $techsPenetration['t'.$tech['id']] = $lastPenetr;
                }
            }
        }

        foreach ($this['Operators'] as $operator) {
            $totalClients = $marketClients; // TODO calculate for the operator correctly
            $clientsDiff = $totalClients - $operator['current_market_size'];
            $capex = 0.00;
            $opex = 0.00;
            $revenue = 0.00;

            //TODO Update operator market share
            $operator['market_share'] = 100.00;

            $opTick = new Tick();
            $opTick->setNbr($this['current_tick']);
            $opTick->setMarketShare($operator['market_share']);
            $opTick->setClients($totalClients);
            $opTick->setOperator($operator);
            $opTick->setScenario($this);
            $opTick->save();

            foreach ($operator['Services'] as $service) {
                $technology = $service['Technology'];
                if (isset($techsPenetration['t'.$technology['id']])) {
                    $techClients = $totalClients * $techsPenetration['t'.$technology['id']] / $marketPenetration;
                    $servClients = round($service['clients_quota'] / 100 * $techClients);

                    $equipments = Doctrine_Core::getTable('Equipment')->createQuery('e')
                                      ->where('e.architecture_id = ?', $technology['Architecture']['id'])
                                      ->orderBy('e.network_level ASC')
                                      ->execute();
                    foreach ($equipments as $equipment) {
                        // Mark obsolete equipments
                        Doctrine_Core::getTable('AcquiredEquipment')->createQuery('ae')
                            ->update()
                            ->set('ae.is_obsolete', '1')
                            ->where('ae.equipment_id = ?', $equipment['id'])
                            ->andWhere('ae.available_until = ?', $this['current_tick'])
                            ->andWhere('ae.is_obsolete = ?', false) // safe only
                            ->execute();

                        $targetTotal = ceil($servClients / $equipment['maximum_clients']);
                        // Get currently existing equipments of this type
                        $currentTotal = Doctrine_Core::getTable('AcquiredEquipment')->createQuery('ae')
                            ->select('SUM(ae.quantity)')
                            ->where('ae.equipment_id = ?', $equipment['id'])
                            ->andWhere('ae.is_obsolete = ?', false)
                            ->execute(array(), Doctrine_Core::HYDRATE_SINGLE_SCALAR);

                        $currentPrice = $equipment->getPriceByTick($this['current_tick']);

                        $acquired = new AcquiredEquipment();
                        $quantity = $targetTotal - $currentTotal;
                        $acquired->setQuantity($quantity);
                        $acquired->setPrice($currentPrice);
                        $acquired->setAvailableUntil($this['current_tick'] + $equipment['life_expectation']);
                        $acquired->setEquipmentId($equipment['id']);
                        $acquired->setTick($opTick);
                        $acquired->save();

                        $capex -= $quantity * $currentPrice;
                    }
                    if ($clientsDiff > 0) {
                        $newClients = round($service['clients_quota'] / 100 * $clientsDiff);
                        $revenue += $newClients * $service['setup_fee'];
                    }
                    $opex -= $servClients * $service['cost_per_user'];

                    $ticksFromTechStart = $this['current_tick'] - $technology['first_tick_available'];
                    $updatedRate = pow((1 - $this['packages_erosion_rate']), $ticksFromTechStart);
                    $revenue += $servClients * $service['periodic_fee'] * $updatedRate;
                }
            }
            $accumCapex = $operator['accumulated_CAPEX'] * (1 - $this['depreciation_rate']) + $capex;
            // Some CAPEX percentage as OPEX
            //$opex -= $targetTotal * $currentPrice * $service['CAPEX_percentage'];
            // Em cada instante retirar como opex 5% do capex acumulado e actualizado!?
            $opex += $accumCapex * ($service['CAPEX_percentage'] / 100); // CAPEX is already negative

            //Update the remaining details of a Tick
            $opTick->setCAPEX($capex);
            $opTick->setOPEX($opex);
            $opTick->setRevenue($revenue);
            $cashflow = $capex + $opex + $revenue;
            $opTick->setCashflow($cashflow);
            $balance = $operator['balance'] + $cashflow;
            $opTick->setBalance($balance);
            $opTick->setEquity($balance - $accumCapex); //TODO Confirmar!!!
            $opTick->save();

            if ($operator['balance'] < 0.00 && $balance >= 0.00) {
                $payback = $this['current_tick'] - 1 + abs($operator['balance']) / $cashflow;
                $operator->setPaybackPeriod($payback);
            }
            $operator->setCurrentMarketSize($totalClients);
            $operator->setBalance($balance);
            $operator->setAccumulatedCAPEX($accumCapex);
            // if last step calulate VAL/NPV
            if ($this['finished']) {
                $cashflows = Doctrine_Core::getTable('Tick')->createQuery('t')
                                  ->select('t.cashflow')
                                  ->where('t.operator_id = ?', $operator['id'])
                                  ->orderBy('t.nbr ASC')
                                  ->execute(array(), Doctrine_Core::HYDRATE_SINGLE_SCALAR);

                $financial = new Financial();
                $npv = $financial->NPV($this['interest_rate'], $cashflows);
                $irr = $financial->IRR($cashflows, $this['interest_rate']);

                $operator->setNetPresentValue($npv);
                $operator->setInternalRateOfReturn($irr * 100);
            }
            $operator->save();
        }

        //TODO A new market tick??

        $this->save();
    }
}
