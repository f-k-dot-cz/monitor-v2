<?php

declare(strict_types=1);

namespace App\Modules\Measurement\Repository;

//MODULE/Wire(MeasurementRepository)

use App\Modules\Measurement\Measurement;
use App\Modules\Measurement\Exceptions\MeasurementNotFoundException;
use App\Modules\Measurement\Repository\MeasurementRepository;

class InMemoryMeasurementRepository implements MeasurementRepository
{
    /**
     * @var Measurement[]
     */
    private array $measurements;

    /**
     * @param Measurement[]|null $measurements
     */
    public function __construct(array $measurements = null)
    {
        $this->measurements = $measurements ?? [
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
