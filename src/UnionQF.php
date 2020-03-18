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

        $valq = $this->data[$q];
        $valp = $this->data[$p];
        foreach ($this->data as $k=>$v){
            if($v == $valq){
                $this->data[$k] = $valp;
            }
        }
    }
    public function isConnected($p, $q){
        return $this->data[$p] === $this->data[$q];
    }
}