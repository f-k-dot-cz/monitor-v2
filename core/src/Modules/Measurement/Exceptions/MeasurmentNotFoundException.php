<?php

declare(strict_types=1);

namespace App\Modules\Measurement\Exceptions;

use App\Application\Exceptions\DomainRecordNotFoundException;

class MeasurementNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The measurement you requested does not exist.';
}
