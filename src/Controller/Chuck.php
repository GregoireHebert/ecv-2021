<?php

declare(strict_types=1);

namespace App\Controller;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Chuck
{
    /**
     * @Route(path="/chuck", name="chuck")
     */
    public function verser(Client $client, LoggerInterface $logger)
    {
        $response = $client->get('/jokes/random');
        $data = json_decode($response->getBody()->getContents());

        $logger->info('blague chuck norris affichée', [
            'blague' => $data
        ]);

        return new Response(<<<HTML
<html>
    <head>
        <title>Chuck Norris Fact</title>
    </head>
    <body>
        {$data->value}
    </body>
</html>
HTML
);
    }
}
