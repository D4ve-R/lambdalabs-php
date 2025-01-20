<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Data;

class InstanceType
{
    public string $name;

    public string $description;

    public int $priceCentsPerHour;

    public Specs $specs;

    /** @var Region[] */
    public array $regionsWithCapacityAvailable;

    public function __construct(
        string $name,
        string $description,
        int $priceCentsPerHour,
        Specs $specs,
        array $regionsWithCapacityAvailable
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->priceCentsPerHour = $priceCentsPerHour;
        $this->specs = $specs;
        $this->regionsWithCapacityAvailable = $regionsWithCapacityAvailable;
    }

    public static function fromArray(array $data): self
    {
        $specs = Specs::fromArray($data['specs']);
        $regions = array_map(fn ($region) => Region::fromArray($region), $data['regions_with_capacity_available']);

        return new self(
            $data['instance_type']['name'],
            $data['instance_type']['description'],
            (int) $data['instance_type']['price_cents_per_hour'],
            $specs,
            $regions
        );
    }
}
