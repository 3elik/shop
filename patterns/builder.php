<?php
class Phone
{
    private $brand;
    private $model;
    private $processor;
    private $ram;
    private $storage;
    private $battery;

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function setProcessor($processor)
    {
        $this->processor = $processor;
    }

    public function setRAM($ram)
    {
        $this->ram = $ram;
    }

    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    public function setBattery($battery)
    {
        $this->battery = $battery;
    }
}

interface PhoneBuilder
{
    public function setBrand();
    public function setModel();
    public function setProcessor();
    public function setRAM();
    public function setStorage();
    public function setBattery();
    public function getPhone(): Phone;
}

class SamsungGalaxyS23PhoneBuilder
{
    private $phone;

    public function __construct()
    {
        $this->phone = new Phone();
    }

    public function setBrand()
    {
        $this->phone->setBrand("Samsung");
    }

    public function setModel()
    {
        $this->phone->setModel("Galaxy S23");
    }

    public function setProcessor()
    {
        $this->phone->setProcessor("Snapdragon 8 Gen 2");
    }

    public function setRAM()
    {
        $this->phone->setRAM("8 GB");
    }

    public function setStorage()
    {
        $this->phone->setStorage("256 GB");
    }

    public function setBattery()
    {
        $this->phone->setBattery("3900 mAh");
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }
}

class PocoF5ProPhoneBuilder
{
    private $phone;

    public function __construct()
    {
        $this->phone = new Phone();
    }

    public function setBrand()
    {
        $this->phone->setBrand("Poco");
    }

    public function setModel()
    {
        $this->phone->setModel("F5 Pro");
    }

    public function setProcessor()
    {
        $this->phone->setProcessor("Qualcomm Snapdragon 8 Plus Gen 1");
    }

    public function setRAM()
    {
        $this->phone->setRAM("12 GB");
    }

    public function setStorage()
    {
        $this->phone->setStorage("512 GB");
    }

    public function setBattery()
    {
        $this->phone->setBattery("5160 mAh");
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }
}

interface Director
{
    public function buildPhone(PhoneBuilder $builder);
}

class PhoneDirector implements Director
{
    public function buildPhone(PhoneBuilder $builder)
    {
        $builder->setBrand();
        $builder->setModel();
        $builder->setProcessor();
        $builder->setRAM();
        $builder->setStorage();
        $builder->setBattery();
    }
}

$builder = new SamsungGalaxyS23PhoneBuilder();
$director = new PhoneDirector();
$director->buildPhone($builder);
$phone = $builder->getPhone();
