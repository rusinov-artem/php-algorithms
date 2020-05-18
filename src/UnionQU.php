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
           $this->un($q, $p);
       }else{
           $this->un($p, $q);
       }
    }

    private function un($p,$q)
    {
        $rootQ = $this->root($q);
        $rootP = $this->root($p);
        $this->data[$rootP] = $rootQ;
        $this->size[$rootQ] += $this->size[$rootQ];
    }

    protected function root($p){

        $index = $p;
        while($this->data[$index] != $index)
        {
            $index = $this->data[$index];
        }
        return $index;
    }

    public function isConnected($p, $q){
        return $this->root($p) == $this->root($q);
    }
}