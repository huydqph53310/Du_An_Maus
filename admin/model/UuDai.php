<?php
class UuDai{
    public $id, $name, $timein, $timeout, $url;

    public function __construct( $id, $name, $timein, $timeout, $url){
        $this->id = $id;
        $this->name = $name;
        $this->timein = $timein;
        $this->timeout = $timeout;
        $this->url = $url;
    }

    public function __destruct(){
        
    }
}