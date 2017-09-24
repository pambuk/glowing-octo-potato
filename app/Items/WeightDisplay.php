<?php
namespace App\Items;

class WeightDisplay
{
    protected $value;

    public function __construct($value)
    {
        if ($value < 0) {
            $value = 0;
        }

        $this->value = $value;
    }

    public function get(): string
    {
        if ($this->value < 100) {
            $display = $this->value . 'g';
        } elseif ($this->value < 1000) {
            $display = $this->value / 10 . 'dg';
        } else {
            $display = $this->value / 1000 . 'kg';
        }

        return $display;
    }
}