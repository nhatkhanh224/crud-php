<?php
    class Player
    {
        public $name;
        public $ovr;
        
        function setname($name) {
            $this->name = $name;
        }
        function getname() {
            return $this->name;
        }
    }
    $player = new Player();
    $player->setname('Ronaldo');
    echo $player->getname();
?>