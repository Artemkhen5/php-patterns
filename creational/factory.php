<?php

class User
{
    private string $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

class UserFactory
{
    public static function create(): User
    {
        return new User();
    }
}

$user = UserFactory::create();
$user->setName('John Doe');

var_dump($user->getName());