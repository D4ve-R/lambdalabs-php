<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Requests\Instance;

use D4veR\LambdaLabs\Data\InstanceType;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class Types extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/instances-types';
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();

        return array_map(fn ($instanceType) => InstanceType::fromArray($instanceType), $data['data']);
    }
}
