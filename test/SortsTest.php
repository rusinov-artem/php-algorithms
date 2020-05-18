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
        for($i = 0; $i< 300; $i++){
            $data[$i] = $i;
        }

        shuffle($data);

        Sort::merge($data);

        for ($i = 1; $i < 300; $i++){
            static::assertTrue($data[$i]> $data[$i-1]);
        }
    }

    public function testQuickSort(){
        $data = [];
        for($i = 0; $i< 300; $i++){
            $data[$i] = $i;
        }

        shuffle($data);

        Sort::quick($data);

        for ($i = 1; $i < 300; $i++){
            static::assertTrue($data[$i]< $data[$i-1]);
        }
    }

    public function testMerge(){
        $arr1 = [1,3,5,7,9];
        $arr2 = [2,4,6,8];
        $r = Sort::mergeSorted($arr1, $arr2);
        static::assertEquals([1,2,3,4,5,6,7,8,9], $r);

    }
}