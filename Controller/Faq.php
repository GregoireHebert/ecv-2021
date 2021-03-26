<?php

declare(strict_types=1);

namespace App\Controller;

class Faq
{
    public function __invoke()
    {
        require (__DIR__.'/../View/Faq.php');
    }
}
