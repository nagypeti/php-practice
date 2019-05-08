<?php

class F35 extends Aircraft
{

    private $isPriority;

    public function __construct()
    {
        parent::__construct(50, 12);
        $this->isPriority = true;
    }

    public function __get($field){
        return $this->$field;
    }

}
