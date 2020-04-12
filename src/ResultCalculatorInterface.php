<?php

namespace App;

interface ResultCalculatorInterface
{
    public function calculateResultForAGivenSuite(array $suite);
    public function calculateMatrix(array $matrix);
}
