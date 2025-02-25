<?php

interface Prototype
{
    public function clone(): Prototype;
}

class Person implements Prototype
{
    private string $name;
    private string $job;

    public function clone(): Prototype
    {
        return clone $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function setJob(string $job): void
    {
        $this->job = $job;
    }
}

$person = new Person();
$person->setName("John");

$clone = $person->clone();
$clone->setName("Jane");
var_dump($person->getName(), $clone->getName());