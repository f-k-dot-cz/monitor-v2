<?php

declare(strict_types=1);

namespace App\Modules\Other;

use Psr\Http\Message\ResponseInterface as Response;

class OtherRunAction extends OtherAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $this->logger->info("Other was viewed.");

        return $this->respondWithData([1,2,3,4]);
    }
}
