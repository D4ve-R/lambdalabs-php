<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Facades;

use D4veR\LambdaLabs\LambdaLabs as Client;
use Illuminate\Support\Facades\Facade;

class LambdaLabs extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Client::class;
    }
}
