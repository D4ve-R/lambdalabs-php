<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Data;

class Region
{
    public string $name;
    public string $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['description']
        );
    }
}