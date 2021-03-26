<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class Faq
{
    public function __invoke()
    {
        ob_start();
        require(__DIR__ . '/../../View/Faq.php');

        return new Response(ob_get_clean());
    }
}
