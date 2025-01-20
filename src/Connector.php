<?php

namespace D4veR\LambdaLabs;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\HasTimeout;

class LambdaLabsConnector extends Connector
{
  use HasTimeout;
    
  protected int $connectTimeout = 60;
    
  protected int $requestTimeout = 120;

  public function __construct(
    public readonly string $token,
    protected readonly string $baseUrl = 'https://cloud.lambdalabs.com/api/v1'
  ) {
    //
  }

  public function resolveBaseUrl(): string
  {
    return $this->baseUrl;
  }

  protected function defaultAuth(): TokenAuthenticator
  {
    return new TokenAuthenticator($this->token  . ':');
  }

  protected function defaultHeaders(): array
  {
    return [
      'Content-Type' => 'application/json',
      'Accept' => 'application/json',
    ];
  }
}
