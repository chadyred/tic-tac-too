<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use App\PlayerActionInterface;

class PlayerActionSpec extends ObjectBehavior
{
    public function it_should_be_a_player_action_behaviour()
    {
        $this->shouldImplement(PlayerActionInterface::class);
    }

    public function it_should_give_a_player_value()
    {
        $result = $this->valueOfPlayerIs();
        $result->shouldBeString();
    }

    public function it_should_receive_a_value_for_the_player_and_give_the_player()
    {
        $result = $this->setValue("");
        $result->shouldBeAnInstanceOf(PlayerActionInterface::class);
    }

    public function it_should_set_the_value_receive()
    {
        $this->setValue("foo");
        $this->valueOfPlayerIs()->shouldBe("foo");
    }
}
