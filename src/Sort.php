<?php

namespace Rusinov\Algorithm;

class Sort
{
    public static function select(array &$data){
        $count = count($data);
        for ($i = 0; $i < ($count - 1); $i++) {
            $maxI = static::maxI($data, $i, ($count - 1));
            $temp = $data[$i];
            $data[$i] = $data[$maxI];
            $data[$maxI] = $temp;
        }
    }

    public static function insert(array &$data){
        $i = 1;
        $j = 1;
        $maxIndex = count($data) - 1;
        do {
            static::handleSS($data, $j);
            $i++;
            $j = $i;
        } while ($i <= $maxIndex);
    }

    public static function shell(array &$data)
    {
        $maxIndex = count($data) - 1;
        $h = 1;
        while ($h < round($maxIndex / 3)) {
            $h = 3 * $h + 1;
        }

        while ($h >= 1) {
            for ($i = $h; $i <= $maxIndex; $i++) {
                static::handleSS($data, $i, $h);
            }
            $h = (int)round($h / 3);
        }
    }

    public static function handleSS(&$data, $j, $h = 1){

        while ($j >= $h && $data[$j] > $data[$j - $h]) {
            static::swap($data, $j, $j - $h);
            $j -= $h;
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
        for ($i = $start + 1; $i <= $end; $i++) {
            if ($data[$i] > $max) {
                $max = $data[$i];
                $index = $i;
            }
        }
        return $index;
    }

    public static function mergeSorted($arr1, $arr2)
    {
        $count = count($arr1) + count($arr2);
        $result = [];
        for ($i = 0; $i < $count; $i++) {

            if (false === current($arr1)) {
                $result[$i] = current($arr2);
                next($arr2);
                continue;
            }

            if (false === current($arr2)) {
                $result[$i] = current($arr1);
                next($arr1);
                continue;
            }

            if (current($arr1) < current($arr2)) {
                $result[$i] = current($arr1);
                next($arr1);
            } else {
                $result[$i] = current($arr2);
                next($arr2);
            }
        }
        return $result;
    }

    public static function merge(array &$data)
    {
        $ax = [];
        $count = count($data);
        for ($sz = 1; $sz < $count; $sz = 2 * $sz) {
            for ($offset = 0; $offset + $sz < $count; $offset += 2 * $sz) {
                $hi = $offset + 2 * $sz - 1;
                $mid = $offset + $sz;
                if ($hi >= $count) $hi = $count - 1;
                static::mergeSorted2($data, $ax, $offset, $mid, $hi);
            }
        }
    }

    public static function mergeSorted2(&$arr, &$ax,  $lo, $mid, $hi){

        for ($i = $lo; $i <= $hi; $i++) {
            $ax[$i] = $arr[$i];
        }

        $count = $hi - $lo + 1;

        $j = $lo;
        $k = $mid;
        for ($i = 0; $i < $count; $i++) {

            if ($j >= $mid) {
                $arr[$lo + $i] = $ax[$k];
                $k++;
                continue;
            }

            if ($k > $hi) {
                $arr[$lo + $i] = $ax[$j];
                $j++;
                continue;
            }

            if ($ax[$j] < $ax[$k]) {
                $arr[$lo + $i] = $ax[$j];
                $j++;
            } else {
                $arr[$lo + $i] = $ax[$k];
                $k++;
            }
        }
    }

    public static function quick(array &$data, $lo = 0, $hi = null)
    {
        if(\is_null($hi)){
            $hi = count($data) -1;
        }

        if($hi - $lo < 2){
            if($data[$lo] > $data[$hi])
            {
                static::swap($data, $lo, $hi);
            }
            return $lo;
        }

        $r = static::qPartial($data, $lo, $hi);


        static::quick($data, $lo, $r);
        if($r <= $hi)
            static::quick($data, $r, $hi);

    }

    public static function qPartial(array &$array, $lo, $hi){

        $t = $array[$lo];
        $j = $lo + 1;
        $k = $hi;

       while($j < $k){

           while($array[$k]>$t && $k > $j){
               $k--;
           }

           while($array[$j] < $t && $j < $k){
               $j++;
           }

           if($array[$j] > $array[$k]){
               static::swap($array, $j, $k);
           }

       }

       if($array[$lo]>$array[$j])
            static::swap($array, $lo, $j);

       return $j;

    }
}