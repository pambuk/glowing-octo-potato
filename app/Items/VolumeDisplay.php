<?php
namespace App\Items;

class VolumeDisplay
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
        if ($this->value === 0) {
            $display = $this->value .'l';
        } elseif ($this->value < 1) {
            $display = $this->value * 1000 . 'ml';
        } elseif ($this->value >= 1) {
            $display = $this->value . 'l';
        }

        return $display;
    }
}