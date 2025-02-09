<?php

final class Singleton {
    private static ?self $instance = null;
    private static string $name;

    private function __construct()
    {
    }

    public static function getName(): string
    {
        return self::$name;
    }

    public static function setName(string $name): void
    {
        self::$name = $name;
    }

    public static function getInstance(): self
    {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __clone(): void
    {
    }

    public function __wakeup(): void
    {
    }
}

$instance = Singleton::getInstance();
$instance::setName('Singleton');
$instance2 = Singleton::getInstance();

var_dump($instance2::getName());