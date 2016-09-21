<?php

abstract class Fighter{

    public $type_name;

    public function __construct($type){
        $this->type_name = $type;
        return;
    }

    abstract function fight( $target );

}

?>