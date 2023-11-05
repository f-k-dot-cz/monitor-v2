<?php


#[Attribute(Attribute::TARGET_ALL)]
class Route
{
    public $wireClass;
    public function __construct($className = null)
    {
        $this->wireClass = $className;
    }

    private function _wire($original = null)
    {
        return [$original => $this->wireClass];
    }

    public static function wire($repoClass)
    {
        $reflection = new ReflectionClass($repoClass);
        $autowires = $reflection->getAttributes(Autowire::class);

        if(!count($autowires)) {
            return false;
        }

        $autowire = $autowires[0];
        $autowireInstance = $autowire->newInstance();
        return $autowireInstance->_wire($repoClass);
    }
}

class DruhaTrida
{
    public function __construct()
    {
        echo 'CCC';
    }
}

#[Route(DruhaTrida::class)]
class Nevim
{
    public function __construct()
    {
        echo 'AAA';
    }

    public function __call($name, $el)
    {
        echo 'Calling fn ' . $name . ' / ' . json_encode($el);
    }

    public static function __callStatic($name, $arguments)
    {
        echo 'Calling st fn ' . $name . ' / ' . $arguments;
    }

    public function shit()
    {
        echo 'SHIT ME!';
    }

}

$test = new Nevim();
$test->shit();
