<?php

namespace spec;

use BowlingGame;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(BowlingGame::class);
    }

    public function it_scores_a_gutter_game_as_zero()
    {
        $this->rollTimes(20, 0);

        $this->score()->shouldBe(0);
    }

    public function it_scores_the_sum_of_all_pins()
    {
        $this->rollTimes(20, 1);
        $this->score()->shouldBe(20);
    }

    public function it_awards_a_one_roll_bonus_for_every_spare()
    {
        $this->rollSpare();
        $this->roll(5);
        $this->rollTimes(17, 0);
        $this->score()->shouldBe(20);
    }
    
    public function it_awards_a_two_roll_bonus_for_every_strike()
    {
        $this->roll(10);
        $this->roll(7);
        $this->roll(2);
        $this->rollTimes(17, 0);
        $this->score()->shouldBe(28);
    }

    public function it_scores_perfect_game()
    {
        $this->rollTimes(12, 10);
        $this->score()->shouldBe(300);
    }

    public function it_guards_invalid_roll()
    {
        $this->shouldThrow('InvalidArgumentException')->duringRoll(-1);        
    }


    private function rollSpare(): void
    {
        $this->roll(2);
        $this->roll(8);
    }

    private function rollTimes(int $times, int $pins): void
    {
        for ($i = 0; $i < $times; $i++) {
            $this->roll($pins);
        }
    }
}
