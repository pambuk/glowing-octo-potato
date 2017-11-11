<?php
namespace App\Traits;

use Cowsayphp\Farm;

trait Cow
{
    public function say(string $message): string
    {
        $cow = Farm::create(\Cowsayphp\Cow::class);
        return '<pre>'. $cow->say($message) .'</pre>';
    }
}