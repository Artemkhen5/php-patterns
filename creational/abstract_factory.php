<?php

interface Phone
{
    public function about(): string;
}

class AndroidPhone implements Phone
{
    public function about(): string
    {
        return "Android phone";
    }
}

class IphonePhone implements Phone
{
    public function about(): string
    {
        return "Iphone phone";
    }
}

interface Tablet
{
    public function about(): string;
}

class AndroidTablet implements Tablet
{
    public function about(): string
    {
        return "Android tablet";
    }
}

class IpadTablet implements Tablet
{
    public function about(): string
    {
        return "Ipad tablet";
    }

}

interface AbstractFactory
{
    public function createPhone(): Phone;

    public function createTablet(): Tablet;
}

class AndroidDeviceFactory implements AbstractFactory
{
    public function createPhone(): phone
    {
        return new AndroidPhone();
    }

    public function createTablet(): tablet
    {
        return new AndroidTablet();
    }
}

class AppleDeviceFactory implements AbstractFactory
{
    public function createPhone(): Phone
    {
        return new IphonePhone();
    }

    public function createTablet(): Tablet
    {
        return new IpadTablet();
    }
}

$android = new AndroidDeviceFactory();
$androidPhone = $android->createPhone();
echo $androidPhone->about() . PHP_EOL;
$androidTablet = $android->createTablet();
echo $androidTablet->about() . PHP_EOL;

$apple = new AppleDeviceFactory();
$ipad = $apple->createTablet();
echo $ipad->about() . PHP_EOL;
$iphone = $apple->createPhone();
echo $iphone->about() . PHP_EOL;