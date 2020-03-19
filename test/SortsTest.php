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

        Sort::selectSort($data);

        for ($i = 1; $i < 300; $i++){
            static::assertTrue($data[$i]< $data[$i-1]);
        }

    }
}