<?php

declare(strict_types=1);

namespace App\Application\Actions\Measurement;

use App\Application\Actions\Action;
use App\Domain\Measurement\MeasurementRepository;
use Psr\Log\LoggerInterface;

abstract class MeasurementAction extends Action
{
    protected MeasurementRepository $measurementRepository;

    public function __construct(LoggerInterface $logger, MeasurementRepository $measurementRepository)
    {
        parent::__construct($logger);
        $this->measurementRepository = $measurementRepository;
    }
}
