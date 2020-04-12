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

    function it_should_calculate_any_line()
    {
        $result = $this->calculateResultForAGivenLine([]);
        $result->shouldBeBool();
    }

    function it_should_return_result_even_all_line_information_is_not_given()
    {
        $result = $this->calculateResultForAGivenLine(['foo', 'bar']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenLine(['bob']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenLine(['bob', 'alice', 'test', 'foo']);
        $result->shouldReturn(false);
    }

    function it_should_return_false_if_line_is_not_complete()
    {
        $result = $this->calculateResultForAGivenLine(['x', 'x', '']);
        $result->shouldReturn(false);
    }

    function it_should_calculate_return_true_when_a_line_is_done()
    {
        $result = $this->calculateResultForAGivenLine(['x', 'x', 'x']);
        $result->shouldReturn(true);

        $result = $this->calculateResultForAGivenLine(['o', 'o', 'o']);
        $result->shouldReturn(true);
    }

    function it_should_calculate_return_true_when_a_line_is_not_done()
    {
        $result = $this->calculateResultForAGivenLine(['x', 'o', 'x']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenLine(['o', 'x', 'o']);
        $result->shouldReturn(false);
    }


    function it_should_calculate_any_column()
    {
        $result = $this->calculateResultForAGivenColumn([]);
        $result->shouldBeBool();
    }

    function it_should_return_false_if_column_is_not_complete()
    {
        $result = $this->calculateResultForAGivenColumn(['x', 'x', '']);
        $result->shouldReturn(false);
    }

    function it_should_calculate_return_true_when_a_column_is_done()
    {
        $result = $this->calculateResultForAGivenColumn(['x', 'x', 'x']);
        $result->shouldReturn(true);

        $result = $this->calculateResultForAGivenColumn(['o', 'o', 'o']);
        $result->shouldReturn(true);
    }

    function it_should_calculate_return_true_when_a_column_is_not_done()
    {
        $result = $this->calculateResultForAGivenColumn(['x', 'o', 'x']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenColumn(['o', 'x', 'o']);
        $result->shouldReturn(false);
    }

    function it_should_return_result_even_all_information_column_is_not_given()
    {
        $result = $this->calculateResultForAGivenColumn(['x', 'x']);
        $result->shouldReturn(false);

        $result = $this->calculateResultForAGivenColumn(['x']);
        $result->shouldReturn(false);
    }
}
