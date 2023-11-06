<?php

declare(strict_types=1);

namespace App\Modules\User\Actions;

use App\Application\Attributes\Route as Route;

use Psr\Http\Message\ResponseInterface as Response;

#[Route('/users')]
class ListUsersAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $users = $this->userRepository->findAll();

        $this->logger->info("Users list was viewed.");

        return $this->respondWithData($users);
    }
}
