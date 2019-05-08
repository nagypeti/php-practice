<?php

class Aircraft
{

    private $baseDamage;
    private $maxAmmo;
    private $currentAmmo;

    public function __construct($baseDamage, $maxAmmo)
    {
        $this->baseDamage = $baseDamage;
        $this->maxAmmo = $maxAmmo;
        $this->currentAmmo = 0;
    }

    public function __get($field)
    {
        return $this->$field;
    }

    public function refill(&$availableAmmo)
    {
        $ammoNeeded = $this->maxAmmo - $this->currentAmmo;
        if ($ammoNeeded > $availableAmmo) {
            $this->currentAmmo += $availableAmmo;
            $availableAmmo = 0;
        } else {
            $this->currentAmmo += $ammoNeeded;
            $availableAmmo -= $ammoNeeded;
        }
        return $availableAmmo;
    }

    public function fight()
    {
        if ($this->currentAmmo > 0) {
            return $this->getCurrentDamage();
        }
        $this->currentAmmo = 0;
    }

    public function getCurrentDamage()
    {
        return $this->currentAmmo * $this->baseDamage;
    }

    public function getType()
    {
        return get_class($this);
    }

    public function getStatus()
    {
        return "Type {$this->getType()}, Ammo: {$this->currentAmmo}, Base Damage: {$this->baseDamage}, All Damage: {$this->getCurrentDamage()}";

    }

}
