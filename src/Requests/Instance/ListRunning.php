<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Requests\Instance;

use D4veR\LambdaLabs\Data\Instance;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListRunning extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/instances';
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();
        
        return array_map(fn($instance) => Instance::fromArray($instance), $data['data']);
    }
}
