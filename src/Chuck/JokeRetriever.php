<?php

declare(strict_types=1);

namespace App\Chuck;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\HttpFoundation\RequestStack;

class JokeRetriever
{
    private LoggerInterface $logger;
    private string $locale;

    private const JOKES = [
        'fr' => [
            'Un jour chuck norris se mordre par un serpent, et le serpent meurt',
            'Chuck Norris a déjà compté jusqu’à l’infini'
        ],
        'en' => [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
            'Chuck Norris hand shaked Jamel Debbouzze.'
        ]
    ];

    public function __construct(?LoggerInterface $logger = null, RequestStack $request)
    {
        $this->logger = $logger ?? new NullLogger();
        $this->locale = $request->getCurrentRequest()->getLocale();
    }

    public function getRandomQuote(): string
    {
        $joke = self::JOKES[$this->locale][array_rand(self::JOKES[$this->locale])];
        $this->logger->notice('Une blague a été envoyée', [
            'locale' => $this->locale,
            'jokes' => self::JOKES
        ]);

        return $joke;
    }
}
