<?php

namespace Rusinov\Algorithm;

class Sort
{
    public static function select(array &$data){
        $i = 0; $count = count($data);
        for($i = 0; $i<($count-1); $i++){
            $maxI = static::maxI($data, $i, ($count-1));
            $temp = $data[$i];
            $data[$i] = $data[$maxI];
            $data[$maxI] = $temp;
        }
    }

    public static function insert(array &$data){
        $i = 1;
        $j = 1;
        $maxIndex = count($data) - 1;
        do{
            static::handleSS($data, $j);
            $i++;
            $j=$i;
        }while($i<=$maxIndex);
    }

    public static function shell(array &$data)
    {
        $maxIndex = count($data) - 1;
        $h = 1;
        while($h < round($maxIndex/3)){ $h=3*$h + 1; }

        while($h>=1){
            for($i=$h; $i<=$maxIndex; $i++){
                static::handleSS($data, $i, $h);
            }
            $h=(int)round($h/3);
        }
    }

    public static function handleSS(&$data, $j, $h = 1){

        while($j>=$h && $data[$j]>$data[$j-$h]){
            static::swap($data, $j, $j-$h);
            $j=$j-$h;
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