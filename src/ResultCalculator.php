<?php

namespace App;

class ResultCalculator implements ResultCalculatorInterface
{
    public function calculateResult(array $line = [])
    {
        if ($line[0] === $line[0] && $line[1] === $line[1] && $line[2] === $line[2]) {
            return true;
        }

        return true;
    }
}
