<?php

namespace Tests\Unit;

use App\Weight;
use Tests\TestCase;

class WeightTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_detect_weight()
    {
        $weight = new Weight('1kg');
        $this->assertTrue($weight->isValid());
        $this->assertEquals(1000, $weight->get());
        $this->assertEquals('kg', $weight->getUnit());

        $weight = new Weight('100g');
        $this->assertTrue($weight->isValid());
        $this->assertEquals(100, $weight->get());
        $this->assertEquals('g', $weight->getUnit());

        $weight = new Weight('10  deko');
        $this->assertTrue($weight->isValid());
        $this->assertEquals(100, $weight->get());
        $this->assertEquals('deko', $weight->getUnit());

        $weight = new Weight('1.5kg');
        $this->assertTrue($weight->isValid());
        $this->assertEquals(1500, $weight->get());
        $this->assertEquals('kg', $weight->getUnit());

        $weight = new Weight('0g');
        $this->assertTrue($weight->isValid());
        $this->assertEquals(0, $weight->get());
        $this->assertEquals('g', $weight->getUnit());
    }

    /**
     * @test
     */
    public function it_should_not_pass_validation()
    {
        $weight = new Weight(1);
        $this->assertFalse($weight->isValid());

        $weight = new Weight('3l');
        $this->assertFalse($weight->isValid());

        $weight = new Weight('gibberish');
        $this->assertFalse($weight->isValid());
    }
}
