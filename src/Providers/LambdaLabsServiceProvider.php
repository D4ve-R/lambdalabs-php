<?php
/**
 * @author Aaron Francis <aaron@hammerstone.dev>
 */

namespace D4veR\LambdaLabs\Providers;

use D4veR\LambdaLabs\LambdaLabs;
use Illuminate\Support\ServiceProvider;

class LambdaLabsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(LambdaLabs::class, function () {
            return new LambdaLabs(
                config('services.lambda_labs.token')
            );
        });
    }
}