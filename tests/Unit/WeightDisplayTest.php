<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Items\WeightDisplay;

class WeightDisplayTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_display_most_appropriate_unit()
    {
        $display = new WeightDisplay(1000);
        $this->assertEquals('1kg', $display->get());

        $display = new WeightDisplay(0);
        $this->assertEquals('0g', $display->get());

        $display = new WeightDisplay(10);
        $this->assertEquals('10g', $display->get());

        $display = new WeightDisplay(100);
        $this->assertEquals('10dg', $display->get());

        $display = new WeightDisplay(-1);
        $this->assertEquals('0g', $display->get());

        $display = new WeightDisplay(900);
        $this->assertEquals('90dg', $display->get());
    }
}
