<?php

abstract class Aircraft
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

    abstract public function isPriority();

    public function refill($ammo)
    {
        if ($this->currentAmmo < $this->maxAmmo) {
            $ammo -= $this->maxAmmo - $this->currentAmmo;
            $this->currentAmmo = $this->maxAmmo;
        }
        return $ammo;
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

    public function getBaseDamage()
    {
        return $this->baseDamage;
    }

    public function getMaxAmmo()
    {
        return $this->maxAmmo;
    }

    public function getCurrentAmmo()
    {
        return $this->currentAmmo;
    }
}
