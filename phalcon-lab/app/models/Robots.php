<?php

use Phalcon\Mvc\Collection;

class Robots extends Collection
{
    public function initialize()
    {
        $this->setConnectionService("mongo");
    }
}