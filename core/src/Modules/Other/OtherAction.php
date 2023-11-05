<?php

declare(strict_types=1);

namespace App\Modules\Other;

use App\Application\Actions\Action;
use Psr\Log\LoggerInterface;

abstract class OtherAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);

    }
}
