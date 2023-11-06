<?php

declare(strict_types=1);

function rscandir($dir)
{
    $result = [];
    $cdir = scandir($dir);
    foreach ($cdir as $value) {
        if (!in_array($value, array(".",".."))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result = array_merge(rscandir($dir . DIRECTORY_SEPARATOR . $value), $result);
            } else {
                $result[] = $dir . DIRECTORY_SEPARATOR . $value;
            }
        }
    }
    return $result;
}

$origDir = __DIR__ . '/../../src/Modules';

$wireDefinitions = [];
$modulesPaths = [];

foreach(rscandir($origDir) as $fileToProcess) {
    $checkClassName = "App\\Modules" . str_replace([$origDir, ".php"], "", $fileToProcess);

    $fil = str_replace('<?' . 'php', '', file_get_contents($fileToProcess, false, null, 0, 512));
    var_dump($fil);
    $toWire = null;
    if(preg_match('/MODULE\/Wire\(([^\)]+)\)/i', $fil, $wireList)) {
        $toWire = $wireList[1];
    }

    $namespace = '';
    if(preg_match('/namespace ([^;]+);/i', $fil, $namespaceList)) {
        $namespace = $namespaceList[1];
    }

    if(preg_match('/#\[Route\([^\)]+\)\]/', $fil)) {
        $modulesPaths[] = $checkClassName . "::class";
    }

    if($toWire) {
        $wireDefinitions[] = $namespace . '\\' . $toWire . '::class => \\DI\\autowire(' . $checkClassName . '::class)';
    }
}

$wiredData = '<?' . 'php' . "\n\nreturn [\n";
$wiredDataPath = __DIR__ . '/cache/loaded.php';
if($wireDefinitions) {
    $wiredData .= implode(",\n", $wireDefinitions);
}
$wiredData .= "\n];";

$wired = file_put_contents($wiredDataPath, $wiredData);
echo $wired ? 'Modules repositories autowired' : 'Modules repositories wiring failed';
echo "\n";

$modulesDataPath = __DIR__ . '/cache/paths.php';
$modulesData = '<?' . 'php' . "\n\nreturn [\n";
$modulesData .= implode(",\n", $modulesPaths);
$modulesData .= "\n];";

$pathed = file_put_contents($modulesDataPath, $modulesData);
echo $pathed ? 'Modules paths fetched' : 'Modules paths fetch failed';
echo "\n";
