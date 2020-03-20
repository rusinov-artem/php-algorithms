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

    public static function insertSort(array &$data){
        $i = 1;
        $j = 1;
        $maxIndex = count($data) - 1;
        do{
            static::handleSS($data, $j);
            $i++;
            $j=$i;
        }while($i<=$maxIndex);
    }

    public static function handleSS(&$data, $j){
        while($j>=1 && $data[$j]>$data[$j-1]){
            static::swap($data, $j, $j-1);
            $j--;
        }
    }

    public static function swap(&$data, $i, $j){
        $t = $data[$i];
        $data[$i] = $data[$j];
        $data[$j] = $t;
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