<?php

namespace spec\Acme;

use Acme\Tennis;
use Acme\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisSpec extends ObjectBehavior
{
    private $john;
    private $jane;

    public function let(): void
    {
        $this->john = new Player('John Doe', 0);
        $this->jane = new Player('Jane Doe', 0);
        $this->beConstructedWith($this->john, $this->jane);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Tennis::class);
    }

    public function it_scores_a_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }

    public function it_scores_a_1_0_game()
    {
        $this->john->earnPoints(1);

        $this->score()->shouldReturn('Fifteen-Love');
    }

    public function it_scores_a_2_0_game()
    {
        $this->john->earnPoints(2);

        $this->score()->shouldReturn('Thirty-Love');
    }

    public function it_scores_a_3_0_game()
    {
        $this->john->earnPoints(3);

        $this->score()->shouldReturn('Fourty-Love');
    }

    public function it_scores_a_4_0_game()
    {
        $this->john->earnPoints(4);

        $this->score()->shouldReturn('Win for John Doe');
    }

    public function it_scores_a_4_3_game()
    {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);

        $this->score()->shouldReturn('Advantage John Doe');
    }

    public function it_scores_deuce()
    {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(3);

        $this->score()->shouldReturn('Deuce');
    }

    public function it_scores_a_8_10_game()
    {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(10);

        $this->score()->shouldReturn('Win for 00Jane Doe');
    }
}
