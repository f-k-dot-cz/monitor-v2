<?php

declare(strict_types=1);

namespace App\Modules\User\Actions;

use App\Application\Attributes\Route as Route;

use Psr\Http\Message\ResponseInterface as Response;

#[Route('/users/{id}')]
class ViewUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = (int) $this->resolveArg('id');
        $user = $this->userRepository->findUserOfId($userId);

        $this->logger->info("User of id `${userId}` was viewed.");

        return $this->respondWithData($user);
    }
}
