<?php


namespace Rusinov\Algorithm;


class unionQF{
    public $data = [];

    public function __construct($objCount)
    {
        for ($i = 0; $i<$objCount; $i++){
            $this->data[$i] = $i;
        }
    }

    public function union($p, $q){
       $count = count($this->data);
        $var = $this->data[$p];
       for($i = 0; $i < $count; $i++)
       {
           if($this->data[$i] == $var){
               $this->data[$i] = $this->data[$q];
           }
       }
    }
    public function isConnected($p, $q){
       return $this->data[$p] == $this->data[$q];
    }
}