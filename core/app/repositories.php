<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $wireDefinitions = require_once __DIR__ . '/modules/cache/loaded.php';
    $containerBuilder->addDefinitions($wireDefinitions);
};
