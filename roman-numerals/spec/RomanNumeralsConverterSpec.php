<?php

namespace spec;

use RomanNumeralsConverter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralsConverterSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(RomanNumeralsConverter::class);
    }

    public function it_works_for_1()
    {
        $this->convert(1)->shouldReturn('I');
    }

    public function it_works_for_2()
    {
        $this->convert(2)->shouldReturn('II');
    }

    public function it_works_for_5()
    {
        $this->convert(5)->shouldReturn('V');
    }

    public function it_works_for_6()
    {
        $this->convert(6)->shouldReturn('VI');
    }

    public function it_works_for_10()
    {
        $this->convert(10)->shouldReturn('X');
    }

    public function it_works_for_11()
    {
        $this->convert(11)->shouldReturn('XI');
    }

    public function it_works_for_20()
    {
        $this->convert(20)->shouldReturn('XX');
    }

    public function it_works_for_50()
    {
        $this->convert(50)->shouldReturn('L');
    }

    public function it_works_for_100()
    {
        $this->convert(100)->shouldReturn('C');
    }

    public function it_works_for_500()
    {
        $this->convert(500)->shouldReturn('D');
    }

    public function it_works_for_1000()
    {
        $this->convert(1000)->shouldReturn('M');
    }

    public function it_works_for_1999()
    {
        $this->convert(1999)->shouldReturn('MCMXCIX');
    }

    public function it_works_for_4990()
    {
        $this->convert(4990)->shouldReturn('MMMMCMXC');
    }
}
