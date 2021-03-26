<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;

class Hello
{
    public function __invoke() {
        // chercher en base
        $user = new User;
        $user->firstname = 'Greg';
        $user->lastname = 'Hébert';

        require (__DIR__.'/../View/Hello.php');
    }
}
