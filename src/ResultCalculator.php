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

    public function calculateMatrix(array $matrix)
    {
        if (!empty($matrix[0])) {
            $string = [];

            foreach ($matrix as $valuePosxPosy) {
                $string['rows'][$valuePosxPosy[1]][] = $valuePosxPosy[0];
                $string['cols'][$valuePosxPosy[2]][] = $valuePosxPosy[0];
            }

            if (array_key_exists('rows', $string) && $this->calculateResultForAGivenSuite($string['rows'][0])) {
                return true;
            }

            if (array_key_exists('cols', $string) && $this->calculateResultForAGivenSuite($string['cols'][0])) {
                return true;
            }
        }

        return false;
    }
}
