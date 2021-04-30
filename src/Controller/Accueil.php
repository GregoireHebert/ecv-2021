<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Accueil
{
    /**
     * @Route(path="/", name="accueil")
     */
    public function sayHello()
    {
        return new Response("coucou");
    }
}
