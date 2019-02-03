<?php

namespace spec\Acme;

use Acme\Tennis;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Tennis::class);
    }

    public function it_scores_a_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }
}
