<?php

namespace spec\Acme;

use Acme\FizzBuzz;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(FizzBuzz::class);
    }

    public function it_translates_1_for_fizzbuzz()
    {
        $this->execute(1)->shouldReturn(1);
    }

    public function it_translates_2_for_fizzbuzz()
    {
        $this->execute(2)->shouldReturn(2);
    }

    public function it_translates_3_for_fizzbuzz()
    {
        $this->execute(3)->shouldReturn('fizz');
    }

    public function it_translates_5_for_fizzbuzz()
    {
        $this->execute(5)->shouldReturn('buzz');
    }

    public function it_translates_6_for_fizzbuzz()
    {
        $this->execute(6)->shouldReturn('fizz');
    }

    public function it_translates_10_for_fizzbuzz()
    {
        $this->execute(10)->shouldReturn('buzz');
    }

    public function it_translates_15_for_fizzbuzz()
    {
        $this->execute(15)->shouldReturn('fizzbuzz');
    }

    public function it_translates_123_for_fizzbuzz()
    {
        $this->execute(123)->shouldReturn('fizz');
    }

    public function it_translates_a_sequence()
    {
        $this->executeUp(5)->shouldReturn([1, 2, 'fizz', 4, 'buzz']);
    }
}
