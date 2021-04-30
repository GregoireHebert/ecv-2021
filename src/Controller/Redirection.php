<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Router;

class Redirection extends AbstractController
{
    /**
     * @Route(path="/dashboard", name="dashboard")
     */
    public function dashboard()
    {
        if (true) { // TODO test si admin
            return $this->forward(Redirection::class.'::dashboardAdmin');
        }
    }

    /**
     * @Route(path="/dashboard/admin", name="dashboard-admin")
     */
    public function dashboardAdmin()
    {
        return $this->render('dashboard-admin.html.twig');
    }

    /**
     * @Route(path="/notFound", name="notFound")
     */
    public function notFound()
    {
        throw $this->createNotFoundException('Cette page n\'existe pas');
    }

    /**
     * @Route(path="/compteur", name="compteur")
     */
    public function countSession(Request $request)
    {
        $session = $request->getSession();
        $count = $session->get('count', 0);

        $session->set('count', ++$count);

        return new Response(sprintf('<body>%d fois.</body>', $count));
    }
}
