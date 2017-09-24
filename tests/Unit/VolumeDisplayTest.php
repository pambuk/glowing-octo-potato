<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Items\VolumeDisplay;

class VolumeDisplayTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_display_most_appropriate_unit()
    {
        $display = new VolumeDisplay(-1);
        $this->assertEquals('0l', $display->get());

        $display = new VolumeDisplay(0.0);
        $this->assertEquals('0l', $display->get());

        $display = new VolumeDisplay(0);
        $this->assertEquals('0l', $display->get());

        $display = new VolumeDisplay(0.5);
        $this->assertEquals('0.5l', $display->get());

        $display = new VolumeDisplay(0.70);
        $this->assertEquals('0.7l', $display->get());

        $display = new VolumeDisplay(0.51);
        $this->assertEquals('510ml', $display->get());

        $display = new VolumeDisplay(1);
        $this->assertEquals('1l', $display->get());

        $display = new VolumeDisplay(2.5);
        $this->assertEquals('2.5l', $display->get());
    }
}
