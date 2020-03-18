<?php

namespace Rusinov\Algorithm;

class UnionQU
{
    public $data = [];
    protected $size = [];

    public function __construct($objCount)
    {
        for ($i = 0; $i<$objCount; $i++){
            $this->data[$i] = $i;
            $this->size[$i] = 1;
        }
    }

    public function union($p, $q){
        if($this->size[$p] > $this->size[$q]){
            $this->data[$q] = $this->root($p);
            $this->size[$p] += $this->size[$q];
            $this->size[$q] = $this->size[$p];
        }
        else{
            $this->data[$p] = $this->root($q);
            $this->size[$q] += $this->size[$p];
            $this->size[$p] = $this->size[$q];
        }
    }

    protected function root($p){
        if($this->data[$p] == $p){
            return $p;
        }
        else {
            return $this->root($this->data[$p]);
        }
    }

    public function isConnected($p, $q){
        return $this->root($p) == $this->root($q);
    }
}