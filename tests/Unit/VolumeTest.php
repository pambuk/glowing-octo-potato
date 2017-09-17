<?php

namespace Tests\Unit;

use App\Volume;
use Tests\TestCase;

class VolumeTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_detect_volume()
    {
        $volume = new Volume('1l');
        $this->assertTrue($volume->isValid());
        $this->assertEquals(1, $volume->get());
        $this->assertEquals('l', $volume->getUnit());

        $volume = new Volume('0.5l');
        $this->assertTrue($volume->isValid());
        $this->assertEquals(0.5, $volume->get());
        $this->assertEquals('l', $volume->getUnit());

        $volume = new Volume('1.5 l');
        $this->assertTrue($volume->isValid());
        $this->assertEquals(1.5, $volume->get());
        $this->assertEquals('l', $volume->getUnit());

        $volume = new Volume('250 ml');
        $this->assertTrue($volume->isValid());
        $this->assertEquals(0.25, $volume->get());
        $this->assertEquals('ml', $volume->getUnit());
    }

    /**
     * @test
     */
    public function it_should_not_pass_validation()
    {
        $volume = new Volume('garbage');
        $this->assertFalse($volume->isValid());

        $volume = new Volume(1.5);
        $this->assertFalse($volume->isValid());

        $volume = new Volume('3kg');
        $this->assertFalse($volume->isValid());
    }
}
