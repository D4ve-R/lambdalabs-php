<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Requests\Instance;

use D4veR\LambdaLabs\Data\Instance;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListInstances extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/instances';
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();
        $instances = [];

        foreach ($data['data'] as $instance) {
            $instances[] = Instance::fromArray($instance);
        }

        return $instances;
    }
}
