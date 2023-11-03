<?php

declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;

use App\Domain\Measurement\MeasurementRepository;
use App\Infrastructure\Persistence\Measurement\InMemoryMeasurementRepository;

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions(
        [
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        ]
    );

    $containerBuilder->addDefinitions(
        [
            MeasurementRepository::class => \DI\autowire(InMemoryMeasurementRepository::class),
            ]
    );

};
