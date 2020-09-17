<?php
abstract class Car{
    public $name;
    /**
     * Class constructor.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function intro();
    }
class Audi extends Car{
    public function intro()
    {
        return "Name:{$this->name}";
    }
}
class Mer extends Car{
    public function intro()
    {
        return "Name:{$this->name}";
    }
}
$audi=new Audi("Audi");
echo $audi->intro();
?>