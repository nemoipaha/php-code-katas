<?php

namespace spec;

use StringCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(StringCalculator::class);
    }

    public function it_translates_empty_string_to_zero()
    {
        $this->add('')->shouldEqual(0);
    }

    public function it_finds_the_sum_of_one_number()
    {
        $this->add('5')->shouldEqual(5);
    }

    public function it_finds_the_sum_of_two_numbers()
    {
        $this->add('1,2')->shouldEqual(3);
    }

    public function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $this->add('1,2,3,4,5')->shouldEqual(15);
    }

    public function it_disallows_negative_numbers()
    {
        $this->shouldThrow(new \InvalidArgumentException('Invalid number provided: -2'))->duringAdd('3,-2');
    }

    public function it_disallows_1000_or_greater()
    {
        $this->add('3,2,1000')->shouldEqual(5);
    }

    public function it_allows_for_new_line_delimiters()
    {
        $this->add('3,2\n2')->shouldEqual(7);
    }
}
