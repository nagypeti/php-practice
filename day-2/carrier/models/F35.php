<?php

class F35 extends Aircraft
{

    public function __construct()
    {
        parent::__construct(50, 12);
    }

    public function isPriority()
    {
        return true;
    }

}
