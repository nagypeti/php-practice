<?php

class F16 extends Aircraft
{

    private $isPriority;

    public function __construct()
    {
        parent::__construct(30, 8);
        $this->isPriority = false;
    }

    /**
     * Get the value of isPriority
     */
    public function getIsPriority()
    {
        return $this->isPriority;
    }
}
