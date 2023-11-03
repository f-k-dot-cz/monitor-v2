<?php

declare(strict_types=1);

namespace App\Domain\Measurement;

interface MeasurementRepository
{
    /**
     * @return Measurement[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Measurement
     * @throws MeasurementNotFoundException
     */
    public function findMeasurementOfId(int $id): Measurement;
}
