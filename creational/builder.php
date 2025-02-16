<?php

class Pc
{
    public string $cpu = '';
    public string $ram = '';
    public string $ssd = '';
    public string $hdd = '';
    public string $gpu = '';
    public string $powerUnit = '';
    public string $additional = '';

    public function __toString(): string
    {
        return "CPU: {$this->cpu}\n" .
            "RAM: {$this->ram}\n" .
            "SSD: {$this->ssd}\n" .
            "HDD: {$this->hdd}\n" .
            "GPU: {$this->gpu}\n" .
            "PowerUnit: {$this->powerUnit}\n" .
            "Additional: {$this->additional}\n";
    }
}

interface pcBuilder
{
    public function setCpu(string $cpu): self;
    public function setRam(string $ram): self;
    public function setSsd(string $ssd): self;
    public function setHdd(string $hdd): self;
    public function setGpu(string $gpu): self;
    public function setPowerUnit(string $powerUnit): self;
    public function setAdditional(string $additional): self;

    public function getPc(): Pc;
}

class ConcretePcBuilder implements pcBuilder
{
    private Pc $pc;
    public function __construct()
    {
        $this->pc = new Pc();
    }

    public function setCpu(string $cpu): self
    {
        $this->pc->cpu = $cpu;
        return $this;
    }

    public function setRam(string $ram): self
    {
        $this->pc->ram = $ram;
        return $this;
    }

    public function setSsd(string $ssd): self
    {
        $this->pc->ssd = $ssd;
        return $this;
    }

    public function setHdd(string $hdd): self
    {
        $this->pc->hdd = $hdd;
        return $this;
    }

    public function setGpu(string $gpu): self
    {
        $this->pc->gpu = $gpu;
        return $this;
    }

    public function setPowerUnit(string $powerUnit): self
    {
        $this->pc->powerUnit = $powerUnit;
        return $this;
    }

    public function setAdditional(string $additional): self
    {
        $this->pc->additional = $additional;
        return $this;
    }

    public function getPc(): Pc
    {
        return $this->pc;
    }
}

class PcDirector
{
    public function __construct(private ConcretePcBuilder $pcBuilder)
    {
    }

    public function createPcForWork()
    {
        return $this->pcBuilder->setCpu('Ryzen 5 5600g')
            ->setRam('32 gb')
            ->setSsd('500 gb')
            ->setPowerUnit('550 wt')
            ->setAdditional('21.45 inch monitor, keyboard dexp, mouse logitech g102')
            ->getPc();
    }
}

/**
 * Собираем без вручную
 */

$pcBuilder = new ConcretePcBuilder();
$pc = $pcBuilder->setCpu('Ryzen 5 5600g')
    ->setRam('32 gb')
    ->setSsd('500 gb')
    ->setPowerUnit('550 wt')
    ->setAdditional('21.45 inch monitor, keyboard dexp, mouse logitech g102')
    ->getPc();
echo $pc;
/**
 * Собираем с классом @var PcDirector
 */
$pcDirector = new PcDirector(new ConcretePcBuilder());
echo $pcDirector->createPcForWork();