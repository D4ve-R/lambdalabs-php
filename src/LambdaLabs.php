<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs;

use D4veR\LambdaLabs\Requests\Instance\Info;
use D4veR\LambdaLabs\Requests\Instance\Launch;
use D4veR\LambdaLabs\Requests\Instance\ListRunning;
use D4veR\LambdaLabs\Requests\Instance\Restart;
use D4veR\LambdaLabs\Requests\Instance\Terminate;
use D4veR\LambdaLabs\Requests\Instance\Types;

class LambdaLabs
{
    private LambdaLabsConnector $connector;

    public function __construct(
        protected readonly string $token,
    ) {
        $this->connector = new LambdaLabsConnector($this->token);
    }

    /**
     * Launch instances
     *
     * @param  array<string>  $sshKeys
     * @param  array<string>  $fileSystems
     */
    public function launch(
        string $regionName,
        string $instanceType,
        array $sshKeys,
        array $fileSystems,
        int $quantity,
    ): array {
        $request = new Launch($regionName, $instanceType, $sshKeys, $fileSystems, $quantity);

        return $this->connector->send($request)->dtoOrFail();
    }

    /**
     * Terminate instances by their ids
     *
     * @param  array<string>  $ids
     */
    public function terminate(array $ids): array
    {
        $request = new Terminate($ids);

        return $this->connector->send($request)->dtoOrFail();
    }

    /**
     * Restart instances by their ids
     *
     * @param  array<string>  $ids
     */
    public function restart(array $ids): array
    {
        $request = new Restart($ids);

        return $this->connector->send($request)->dtoOrFail();
    }

    /**
     * Get instance info by id
     */
    public function info(string $id): array
    {
        $request = new Info($id);

        return $this->connector->send($request)->dtoOrFail();
    }

    /**
     * Get all running instances info
     */
    public function running(): array
    {
        $request = new ListRunning;

        return $this->connector->send($request)->dtoOrFail();
    }

    /**
     * Get all instance types
     */
    public function types(): array
    {
        $request = new Types;

        return $this->connector->send($request)->dtoOrFail();
    }
}
