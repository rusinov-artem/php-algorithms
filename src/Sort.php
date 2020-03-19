<?php

namespace Rusinov\Algorithm;

class Sort
{
    public static function selectSort(array &$data){
        $i = 0; $count = count($data);
        for($i = 0; $i<($count-1); $i++){
            $maxI = static::maxI($data, $i, ($count-1));
            $temp = $data[$i];
            $data[$i] = $data[$maxI];
            $data[$maxI] = $temp;
        }
    }

    public static function maxI(array $data, int $start, int $end){
        $max = $data[$start];
        $index = $start;
        for($i = $start+1; $i<=$end; $i++){
            if($data[$i] > $max){
                $max = $data[$i];
                $index = $i;
            }
        }
        return $index;
    }
}