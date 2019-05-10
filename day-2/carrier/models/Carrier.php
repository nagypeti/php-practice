<?php

class Carrier
{

    private $aircrafts;
    private $ammo;
    private $health;

    public function __construct($ammo = 100, $health = 1000)
    {
        $this->aircrafts = [];
        $this->ammo = $ammo;
        $this->health = $health;
    }

    public function add(Aircraft $aircraft)
    {
        $this->aircrafts[] = $aircraft;
    }

    public function compareByPriority($a, $b)
    {
        if ($a->isPriority === $b->isPriority) {
            return 0;
        }

        if ($a->isPriority) {
            return -1;
        }
        var_dump($a);
        return 1;
    }

    public function fill()
    {
        usort($this->aircrafts, 'compareByPriority');
        var_dump($this->aircrafts);
//        foreach ($this->aircrafts as $aircraft) {
//            if ($this->ammo <= 0) {
//                echo 'Out of ammo!';
//                break;
//            } elseif ($aircraft->isPriority) {
//                $this->ammo -= $aircraft->refill($this->ammo);
//            } else {
//                $this->ammo -= $aircraft->refill($this->ammo);
//            }
//        }
    }

    public function receiveAttack($damage)
    {
        $this->health -= $damage;
    }

    public function fight(Carrier $enemy)
    {
        $enemy->receiveAttack($this->totalDamage());
    }

    public function totalDamage()
    {
        $totalDamage = 0;
        foreach ($this->aircrafts as $aircraft) {
            $totalDamage += $aircraft->currentAmmo * $aircraft->baseDamage;
        }
        return $totalDamage;
    }

    public function getStatus()
    {
        if ($this->health <= 0) {
            return "It's dead Jim :(";
        } else {
            $statusMessage = "HP: {$this->health} Aircraft count: " . count($this->aircrafts)
            . ", Ammo Storage: {$this->ammo}, Total damage: " . $this->totalDamage() . "<br>Aircrafts:<br>";
            foreach ($this->aircrafts as $aircraft) {
                $statusMessage = $statusMessage . $aircraft->getStatus() . "<br>";
            }
        }
        return $statusMessage;
    }

    public function __get($field)
    {
        return $this->$field;
    }
}
