<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use Symfony\Component\HttpFoundation\Response;

class Hello
{
    public function __invoke() {
        // chercher en base
        $user = new User;
        $user->firstname = 'Greg';
        $user->lastname = 'Hébert';

        ob_start();
        require(__DIR__ . '/../../View/Hello.php');

        return new Response(ob_get_clean());
    }
}
