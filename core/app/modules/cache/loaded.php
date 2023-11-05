<?php

return [
App\Modules\User\Repository\UserRepository::class => \DI\autowire(App\Modules\User\Repository\InMemoryUserRepository::class),
App\Modules\Measurement\Repository\MeasurementRepository::class => \DI\autowire(App\Modules\Measurement\Repository\InMemoryMeasurementRepository::class)
];