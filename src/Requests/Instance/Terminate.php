<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Requests\Instance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class Terminate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly array $ids)
    {
        //
    }

    public function resolveEndpoint(): string
    {
        return '/instance-operations/terminate';
    }

    protected function defaultBody(): array
    {
        return [
            'instance_ids' => $this->ids,
        ];
    }

    public function createDtoFromResponse(Response $response): array
    {
        $data = $response->json();
    
        return $data['terminated_instances'];
    }
}
