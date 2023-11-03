<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Measurement;

use App\Domain\Measurement\Measurement;
use App\Domain\Measurement\MeasurementNotFoundException;
use App\Domain\Measurement\MeasurementRepository;

class InMemoryMeasurementRepository implements MeasurementRepository
{
    /**
     * @var User[]
     */
    private array $users;

    /**
     * @param User[]|null $users
     */
    public function __construct(array $users = null)
    {
        $this->users = $users ?? [
            1 => new Measurement(1, [1,2,3,4]),
            2 => new Measurement(2, [4,5,6,7])
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->measurements);
    }

    /**
     * {@inheritdoc}
     */
    public function findMeasurementOfId(int $id): Measurement
    {
        if (!isset($this->measurements[$id])) {
            throw new MeasurementNotFoundException();
        }

        return $this->measurements[$id];
    }
}
