<?php

namespace D4veR\LambdaLabs\Requests\Instance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class Launch extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $regionName,
        protected readonly string $instanceType,
        protected readonly array $sshKeys,
        protected readonly array $fileSystems,
        protected readonly int $quantity,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/instance-operations/launch';
    }

    protected function defaultBody(): array
    {
        return [
            'region_name' => $this->regionName,
            'instance_type_name' => $this->instanceType,
            'ssh_keys' => $this->sshKeys,
            'file_systems' => $this->fileSystems,
            'quantity' => $this->quantity,
        ];
    }
}
