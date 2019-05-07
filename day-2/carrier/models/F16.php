<?php

class F16 extends Aircraft
{

    public function __construct()
    {
        parent::__construct(30, 8);
    }

    public function isPriority()
    {
        return false;
    }

}
