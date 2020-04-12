<?php

namespace App;

class ResultCalculator implements ResultCalculatorInterface
{
    public function calculateResultForAGivenSuite(array $suite = [])
    {
        if (count($suite) === 3) {
            if ($suite[0] === $suite[1] && $suite[1] === $suite[2]) {
                return true;
            }
        }

        return false;
    }
}
