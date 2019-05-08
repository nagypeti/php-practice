<?php

class F16 extends Aircraft
{

    private $isPriority;

    public function __construct()
    {
        parent::__construct(30, 8);
        $this->isPriority = false;
    }

    public function __get($field){
        return $this->$field;
    }

}
