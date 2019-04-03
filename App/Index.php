<?php

namespace App;

class Index
{
    public $weight;
    public function __construct($weight = null)
    {
        $this->weight = $weight;
        echo 'Working ok';
    }
}
