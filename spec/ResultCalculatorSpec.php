<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use App\ResultCalculatorInterface;

class ResultCalculatorSpec extends ObjectBehavior
{
    function it_should_be_type_of_calculator_result()
    {
        $this->shouldImplement(ResultCalculatorInterface::class);
    }

    function it_should_calculate_any()
    {
        $result = $this->calculateResult([]);
        $result->shouldBeBool();
    }

    function it_should_return_false_if_line_s_not_complete()
    {
        $result = $this->calculateResult(['x', 'x', '']);
        $result->shouldReturn(false);
    }

    function it_should_calculate_return_true_when_a_line_is_done()
    {
        $result = $this->calculateResult(['x', 'x', 'x']);
        $result->shouldReturn(true);
    }
}
