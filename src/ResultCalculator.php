<?php

namespace App;

class ResultCalculator implements ResultCalculatorInterface
{
    public function calculateResult(array $line = [])
    {
        if (!empty($line) && $line[0] === $line[1] && $line[1] === $line[2]) {
            return true;
        }

        return false;
    }
}
