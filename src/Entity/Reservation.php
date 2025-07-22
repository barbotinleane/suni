<?php

namespace App\Entity;

class Reservation
{
    private string $name;
    private string $email;
    private string $message;

    public function __construct()
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}
