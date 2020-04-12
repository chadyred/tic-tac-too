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

    function it_should_calculate_any_suite()
    {
        $result = $this->calculateResultForAGivenSuite([]);
        $result->shouldBeBool();
    }

    function it_should_return_result_even_all_suite_information_is_not_given()
    {
        $result = $this->calculateResultForAGivenSuite(['foo', 'bar']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenSuite(['bob']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenSuite(['bob', 'alice', 'test', 'foo']);
        $result->shouldReturn(false);
    }

    function it_should_return_false_if_suite_is_not_complete()
    {
        $result = $this->calculateResultForAGivenSuite(['x', 'x', '']);
        $result->shouldReturn(false);
    }

    function it_should_calculate_return_true_when_a_suite_is_done()
    {
        $result = $this->calculateResultForAGivenSuite(['x', 'x', 'x']);
        $result->shouldReturn(true);

        $result = $this->calculateResultForAGivenSuite(['o', 'o', 'o']);
        $result->shouldReturn(true);
    }

    function it_should_calculate_return_true_when_a_suite_is_not_done()
    {
        $result = $this->calculateResultForAGivenSuite(['x', 'o', 'x']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenSuite(['o', 'x', 'o']);
        $result->shouldReturn(false);
    }
}
