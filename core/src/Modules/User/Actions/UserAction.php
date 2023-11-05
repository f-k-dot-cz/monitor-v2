<?php

declare(strict_types=1);

namespace App\Modules\User\Actions;

use App\Application\Actions\Action;
use App\Modules\User\Repository\UserRepository;
use Psr\Log\LoggerInterface;

abstract class UserAction extends Action
{
    protected UserRepository $userRepository;

    public function __construct(LoggerInterface $logger, UserRepository $userRepository)
    {
        parent::__construct($logger);
        $this->userRepository = $userRepository;
    }
}
