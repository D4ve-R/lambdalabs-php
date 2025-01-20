<?php

namespace D4veR\LambdaLabs\Requests\Instance;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class Types extends Request
{
  protected Method $method = Method::GET;
  
  public function resolveEndpoint(): string
  {
    return '/instances-types';
  }
}