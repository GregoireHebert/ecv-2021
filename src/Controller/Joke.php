<?php

declare(strict_types=1);

namespace App\Controller;

use App\Chuck\JokeRetriever;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/joke/{_locale}", name="joke")
 */
class Joke
{
    public function __invoke(JokeRetriever $jokeRetriever, LoggerInterface $logger, string $monParametre)
    {
        $logger->info($monParametre);

        return new Response($jokeRetriever->getRandomQuote());
    }
}
