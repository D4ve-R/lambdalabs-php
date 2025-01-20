<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Requests\Instance;

use D4veR\LambdaLabs\Data\Instance;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class Info extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected readonly string $id)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/instances'.$this->id;
    }

    public function createDtoFromResponse(Response $response): Instance
    {
        $data = $response->json();

        return Instance::fromArray($data['data']);
    }
}
