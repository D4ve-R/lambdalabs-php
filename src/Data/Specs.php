<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Data;

class Specs
{
    public int $vcpus;

    public int $memoryGib;

    public int $storageGib;

    public function __construct(int $vcpus, int $memoryGib, int $storageGib)
    {
        $this->vcpus = $vcpus;
        $this->memoryGib = $memoryGib;
        $this->storageGib = $storageGib;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['vcpus'],
            $data['memory_gib'],
            $data['storage_gib']
        );
    }
}
