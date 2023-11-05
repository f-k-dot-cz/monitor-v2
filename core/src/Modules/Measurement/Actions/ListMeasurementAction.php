<?php

declare(strict_types=1);

namespace App\Modules\Measurement\Actions;

use Psr\Http\Message\ResponseInterface as Response;

class ListMeasurementAction extends MeasurementAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $measurements = $this->measurementRepository->findAll();

        $this->logger->info("Measurements list was viewed.");

        return $this->respondWithData($measurements);
    }
}
