<?php

namespace D4veR\LambdaLabs\Requests\Instance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

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
}
