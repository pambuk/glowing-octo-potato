<?php
namespace App\Items;

class Volume
{
    protected $data;
    protected static $units = ['l', 'ml'];
    protected $rule;
    protected $matches;

    public function __construct(string $data)
    {
        $this->data = $data;
        $this->rule = '/([0-9\.,]*) *([a-zA-Z]*)/';
        preg_match($this->rule, $this->data, $this->matches);
    }

    public function isValid(): bool
    {
        return is_numeric($this->matches[1]) && ! empty($this->matches[2]) &&
            in_array($this->matches[2], self::$units, true);
    }

    public function get(): float
    {
        return $this->convert($this->matches[1]);
    }

    public function getUnit(): string
    {
        return $this->matches[2];
    }

    private function convert($data): float
    {
        switch ($this->getUnit()) {
            case 'ml':
                $data /= 1000;
                break;
        }

        return $data;
    }
}