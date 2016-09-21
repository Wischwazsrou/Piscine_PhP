<?php

class UnholyFactory{

    public $message;
    public $tab = array();

    public function absorb($instance){
        if (get_parent_class($instance) == "Fighter")
        {
            $type_s = $instance->type_name;
            if(array_key_exists($type_s, $this->tab))
                $this->message = "already absorbed a fighter of type ".$type_s;
            else
            {
                $this->message = "absorbed a fighter of type ".$type_s;
                $this->tab[$type_s] = $instance;
            }
        }
        else
            $this->message = "can't absorb this, it's not a fighter";
        print "(Factory ".$this->message.")".PHP_EOL;
    }

    public function fabricate($soldier){
        if(array_key_exists($soldier, $this->tab))
        {
            $this->message = "fabricates a fighter of type ".$soldier;
            print "(Factory ".$this->message.")".PHP_EOL;
             return $this->tab[$soldier];
        }
        else
        {
            $this->message = "hasn't absorbed any fighter of type ".$soldier;
            print "(Factory ".$this->message.")".PHP_EOL;
            return NULL;
        }

    }
}

?>