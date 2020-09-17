<?php
    class Car{
    public $name;
    /**
     * Class constructor.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function intro(){
        echo "Name : {$this->name}";
    }
}
class Audi extends Car{
    public function message()
    {
        echo "Audi is one of my dream car";
    }
}
$audi=new Audi('Audi');
echo $audi->intro();
echo "<br>";
echo $audi->message();
?>