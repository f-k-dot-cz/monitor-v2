<?php

declare(strict_types=1);

namespace App\Modules\Measurement\Repository;

use App\Modules\Measurement\Measurement;

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
