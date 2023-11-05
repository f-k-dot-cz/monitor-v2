<?php

declare(strict_types=1);

namespace App\Modules\Measurement\Actions;

use App\Application\Actions\Action;
use App\Modules\Measurement\Repository\MeasurementRepository;
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
