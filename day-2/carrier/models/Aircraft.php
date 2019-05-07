<?php

abstract class Aircraft
{

    private $baseDamage;
    private $maxAmmo;

    public function __construct($baseDamage, $maxAmmo)
    {
        $this->baseDamage = $baseDamage;
        $this->maxAmmo = $maxAmmo;
    }

    abstract public function reFill(): void;
    abstract public function fight(): int;
    abstract public function getType(): string;
    abstract public function getStatus(): string;
    abstract public function isPriority(): boolean;

}
