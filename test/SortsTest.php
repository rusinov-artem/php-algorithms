<?php


use Rusinov\Algorithm\Sort;

class SortsTest extends \PHPUnit\Framework\TestCase
{
    public function testSelectionSort()
    {
        $data = [];
        for($i = 0; $i< 300; $i++){
            $data[$i] = $i;
        }

        shuffle($data);

        Sort::select($data);

        for ($i = 1; $i < 300; $i++){
            static::assertTrue($data[$i]< $data[$i-1]);
        }

    }

    public function testInsertSort(){
        $data = [];
        for($i = 0; $i< 300; $i++){
            $data[$i] = $i;
        }

        shuffle($data);

        Sort::insert($data);

        for ($i = 1; $i < 300; $i++){
            static::assertTrue($data[$i]< $data[$i-1]);
        }
    }

    public function testShellSort(){
        $data = [];
        for($i = 0; $i< 300; $i++){
            $data[$i] = $i;
        }

        shuffle($data);

        Sort::shell($data);

        for ($i = 1; $i < 300; $i++){
            static::assertTrue($data[$i] < $data[$i-1]);
        }
    }

    public function testMergeSort(){
        $data = [];
        $capacity = 500;
        for($i = 0; $i< $capacity; $i++){
            $data[$i] = $i;
        }

        shuffle($data);


        Sort::$swap =0;
        Sort::merge($data);
        var_dump(Sort::$swap);

        $r = true;
        for ($i = 1; $i < $capacity; $i++){
            if ($data[$i] < $data[$i-1]){
                $r = false;
            }
        }
        static::assertTrue($r);
    }

    public function testQuickSort(){
        $data = [];
        $capacity = 500;
        for($i = 0; $i< $capacity; $i++){
            $data[$i] = $i;
        }

        shuffle($data);
        //$data = [0,4,3,1,2];

        Sort::$swap =0;
        Sort::quick($data);
        var_dump(Sort::$swap);

        $r = true;
        for ($i = 1; $i < $capacity; $i++){
            if ($data[$i] < $data[$i-1]){
                $r = false;
            }
        }
        static::assertTrue($r);
    }

    public function testQuick2kSort(){
        $data = [];
        $capacity = 500;
        for($i = 0; $i< $capacity; $i++){
            $data[$i] = $i;
        }

        shuffle($data);
        //$data = [0,4,3,1,2];

        Sort::$swap = 0;
        Sort::quick2($data);
        var_dump(Sort::$swap);

        $r = true;
        for ($i = 1; $i < $capacity; $i++){
            if ($data[$i] < $data[$i-1]){
                $r = false;
            }
        }
        static::assertTrue($r);
    }

    public function testMerge(){
        $arr1 = [1,3,5,7,9];
        $arr2 = [2,4,6,8];
        $r = Sort::mergeSorted($arr1, $arr2);
        static::assertEquals([1,2,3,4,5,6,7,8,9], $r);
    }

    public function testSwat(){
        $data = [1,2];
        Sort::swap($data, 0,1);
        static::assertTrue($data == [2,1]) ;

    }

}