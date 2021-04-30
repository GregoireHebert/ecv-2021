<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

final class Contact
{
    /**
     * @Assert\Length(min=5)
     * @Assert\NotBlank()
     */
    public string $subject;
    /**
     * @Assert\Length(min=1)
     * @Assert\NotBlank()
     */
    public string $name;
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public string $email;
    /**
     * @Assert\Length(min=1)
     * @Assert\NotBlank()
     */
    public string $message;
}
