<?php

declare(strict_types=1);

namespace App\Modules\User\Exceptions;

use App\Application\Exceptions\DomainRecordNotFoundException;

class UserNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The user you requested does not exist.';
}
