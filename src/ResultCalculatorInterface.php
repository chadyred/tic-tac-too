<?php

namespace App;

interface ResultCalculatorInterface
{
    public function calculateResultForAGivenLine(array $line);

    public function calculateResultForAGivenColumn(array $column);
}
