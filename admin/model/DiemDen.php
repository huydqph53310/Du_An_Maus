<?php

class DiemDen
{
    public $id, $name, $image, $MaTP, $count;

    public function __construct($id, $name, $image, $MaTP, $count)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->MaTP = $MaTP;
        $this->count = $count;
    }

    public function __destruct(){
        return;
    }
}
