<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs;

use D4veR\LambdaLabs\Requests\Instance\Launch;
use D4veR\LambdaLabs\Requests\Instance\Terminate;

class LambdaLabs {
    
    private LambdaLabsConnector $connector;

    public function __construct(
        protected readonly string $token,
    ) {
        $this->connector = new LambdaLabsConnector($this->token);
    }

    /**
     * Launch instances
     * @param string $regionName
     * @param string $instanceType
     * @param array<string> $sshKeys
     * @param array<string> $fileSystems
     * @param int $quantity
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
     * @param array<string> $ids
     */
    public function terminate(array $ids): array 
    {
        $request = new Terminate($ids);
        return $this->connector->send($request)->dtoOrFail();
    }
}
