<?php
class UuDai{
    public $id, $name, $timein, $timeout;

    public function __construct( $id, $name, $timein, $timeout){
        $this->id = $id;
        $this->name = $name;
        $this->timein = $timein;
        $this->timeout = $timeout;
    }

    public function __destruct(){
        
    }
}


?>