<?php

class Carrier
{

    private $aircrafts;
    private $ammo;
    private $health;

    public function __construct($ammo = 100, $health = 1000)
    {
        $this->aircrafts = array();
        $this->ammo = $ammo;
        $this->health = $health;
    }

    public function add(Aircraft $aircraft)
    {
        $this->aircrafts[] = $aircraft;
    }

    public function fill()
    {
        foreach ($this->aircrafts as $aircraft) {
            if ($this->ammo <= 0) {
                throw new Exception('Out of ammo sir!');
            } elseif ($aircraft->isPriority()){
                $this->ammo = $this->ammo - $aircraft->refill($this->ammo);
            }
        }
        foreach ($this->aircrafts as $aircraft) {
            if ($this->ammo <= 0) {
                throw new Exception('Out of ammo sir!');
            } elseif (!$aircraft->isPriority()) {
                $this->ammo = $this->ammo - $aircraft->refill($this->ammo);
            }
        }    
    }

    public function receiveAttack($totalDamage) {
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
            $totalDamage += $aircraft->getCurrentAmmo() * $aircraft->getBaseDamage();
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

}
