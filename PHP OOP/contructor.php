<?php
class Student{
    public $name;
    public $age;
    public function __construct($name,$age) {
        $this->name = $name;
        $this->age=$age;
    }
    function getName()
    {
        return $this->name;
    }
    function getAge()
    {
        return $this->age;
    }
    /**
     * Class destructor.
     */
    public function __destruct()
    {
        echo "My name is {$this->name} and age is {$this->age} years old";
    }
}
$student=new Student('Khanh','20');
echo $student->getName();
echo "</br>";
echo $student->getAge();
echo "</br>";
?>