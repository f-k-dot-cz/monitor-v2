<?php

declare(strict_types=1);

namespace App\Modules\Measurement;

use JsonSerializable;

class Measurement implements JsonSerializable
{
    private ?int $id;

    private $data;

    public function __construct(?int $id, $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): string
    {
        return $this->data;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'data' => $this->data,
        ];
    }
}
