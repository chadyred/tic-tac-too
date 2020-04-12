<?php

namespace spec\App;

use App\PlayerActionInterface;
use App\ResultCalculator;
use App\ResultCalculatorInterface;
use PhpSpec\ObjectBehavior;
use App\GameInterface;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    public function let(
        ResultCalculatorInterface $calculator,
        PlayerActionInterface $p1,
        PlayerActionInterface $p2
    )
    {
        $this->beConstructedWith($calculator, $p1, $p2);
    }

    public function it_should_be_a_game_action_behaviour()
    {
        $this->shouldImplement(GameInterface::class);
    }

    public function it_should_receive_a_calculator(ResultCalculatorInterface $calculator)
    {
//        $calculator->beADoubleOf(ResultCalculator::class); // Could be use as a Fake class to try for exemple data implementation

        $this->shouldHaveType(GameInterface::class);
    }

    public function it_should_be_playable(ResultCalculatorInterface $calculator)
    {
//        $calculator->beADoubleOf(ResultCalculatorInterface::class); // Could be use as a Fake class to try for exemple data implementation
        $this->play();
        $calculator->calculateResultForAGivenSuite(Argument::any())->shouldBeCalled();
    }

    public function it_should_be_interactable_with_players(
        ResultCalculatorInterface $calculator,
        PlayerActionInterface $p1,
        PlayerActionInterface $p2
    )
    {
        $game = $this->currentPlayer($p1);
        $game->shouldBeAnInstanceOf(GameInterface::class);

        $result = $game->getCurrentPlayer();
        $result->shouldBeAnInstanceOf(PlayerActionInterface::class);

        $result->shouldBe($p1);
    }

    public function it_should_allowed_players_to_give_ther_symbol()
    {
        $this->playerGiveSymbolAtPosition("x", 0, 0);
        $result = $this->getCurrentSymbole();
        $result->shouldBeArray();
        $result->shouldBe(["x", 0, 0]);
    }

    public function it_should_give_all_action()
    {
        $result = $this->getAllAction();
        $result->shouldBeArray();
        $result->shouldBe([]);
    }

    public function it_should_add_action_to_game()
    {
        $this->addAction([]);
        $result = $this->getAllAction();
        $result->shouldBeArray();
        $result->shouldBe([[]]);

        $this->addAction(["x", 0, 0]);

        $result = $this->getAllAction();
        $result->shouldBeArray();
        $result->shouldBe([
            [],
            ["x", 0, 0]
        ]);
    }

    public function it_should_be_win_by_a_player(
        ResultCalculatorInterface $calculator,
        PlayerActionInterface $p1,
        PlayerActionInterface $p2
    )
    {
        // Stub + Spy + Mock
        $calculator->calculateResultForAGivenSuite(Argument::any())->willReturn(true);

//        $calculator->beADoubleOf(ResultCalculatorInterface::class); // Could be use as a Fake class to try for exemple data implementation
        $result = $this->play();
        $calculator->calculateResultForAGivenSuite(Argument::any())->shouldBeCalled();

        $result->shouldBeBool();
        $result->shouldBe(true);
    }
}
