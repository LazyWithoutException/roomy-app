<?php

class Marker
{
    var $marker_id;
    var $longituda;
    var $latituda;

    public function __construct($marker_id,$longituda,$latituda)
    {
        $this->marker_id=$marker_id;
        $this->longituda=$longituda;
        $this->latituda=$latituda;
    }
}

?>