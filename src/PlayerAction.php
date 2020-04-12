<?php

namespace App;

class PlayerAction implements PlayerActionInterface
{
    private $value;

    public function __construct()
    {
        $this->value = "";
    }

    public function valueOfPlayerIs()
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;

        return $this;
    }
}
