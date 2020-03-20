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
            static::assertTrue($data[$i]< $data[$i-1]);
        }
    }
}