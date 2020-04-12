<?php

namespace App;

class ResultCalculator implements ResultCalculatorInterface
{
    public function calculateResultForAGivenLine(array $line = [])
    {
        if (count($line) === 3) {
            if (!empty($line) && $line[0] === $line[1] && $line[1] === $line[2]) {
                return true;
            }
        }

        return false;
    }

    public function calculateResultForAGivenColumn(array $column)
    {
        if (count($column) === 3) {
            if (!empty($column) && $column[0] === $column[1] && $column[1] === $column[2]) {
                return true;
            }
        }

        return false;
    }
}
