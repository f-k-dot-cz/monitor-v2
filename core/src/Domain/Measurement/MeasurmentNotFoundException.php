<?php

declare(strict_types=1);

namespace App\Domain\Measurement;

use App\Domain\DomainException\DomainRecordNotFoundException;

class MeasurementNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The measurement you requested does not exist.';
}
