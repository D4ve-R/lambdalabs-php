<?php

declare(strict_types=1);

namespace D4veR\LambdaLabs\Data;

class Instance
{
    public string $id;
    public string $name;
    public string $ip;
    public string $private_ip;
    public string $status;
    public array $ssh_key_names;
    public array $file_system_names;
    public object $region;
    public InstanceType $instance_type;
    public string $hostname;
    public string $jupyter_token;
    public string $jupyter_url;
    public bool $is_reserved;

    public function __construct(
      string $id,
      string $name,
      string $ip,
      string $private_ip,
      string $status,
      array $ssh_key_names,
      array $file_system_names,
      object $region,
      InstanceType $instance_type,
      string $hostname,
      string $jupyter_token,
      string $jupyter_url,
      bool $is_reserved
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->ip = $ip;
        $this->private_ip = $private_ip;
        $this->status = $status;
        $this->ssh_key_names = $ssh_key_names;
        $this->file_system_names = $file_system_names;
        $this->region = $region;
        $this->instance_type = $instance_type;
        $this->hostname = $hostname;
        $this->jupyter_token = $jupyter_token;
        $this->jupyter_url = $jupyter_url;
        $this->is_reserved = $is_reserved;
    }

    public static function fromArray(array $data): self
    {
        $region = Region::fromArray($data['region']);
        $instanceType = InstanceType::fromArray($data['instance_type']);

        return new self(
            $data['id'],
            $data['name'],
            $data['ip'],
            $data['private_ip'],
            $data['status'],
            $data['ssh_key_names'],
            $data['file_system_names'],
            $region,
            $instanceType,
            $data['hostname'],
            $data['jupyter_token'],
            $data['jupyter_url'],
            $data['is_reserved']
        );
    }
}