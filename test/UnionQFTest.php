<?php

use PHPUnit\Framework\TestCase;
use Rusinov\Algorithm\unionQF;
use Rusinov\Algorithm\UnionQU;

class UnionQFTest extends TestCase
{
    public function testQuickFindAlgorithm()
    {

        $u = new unionQF(8);
        $u->union(1,7);
        self::assertTrue($u->isConnected(1,7));
        $u->union(1, 4);
        self::assertTrue($u->isConnected(1,4));
        self::assertTrue($u->isConnected(7,4));
        $u->union(2,7);
        self::assertTrue($u->isConnected(7,2));
        self::assertTrue($u->isConnected(1,2));
    }

    public function testQuickUnionAlgorithm()
    {

        $u = new unionQU(8);
        $u->union(1,7);
        self::assertTrue($u->isConnected(1,7));
        $u->union(1, 4);
        self::assertTrue($u->isConnected(1,4));
        self::assertTrue($u->isConnected(7,4));
        $u->union(2,7);
        self::assertTrue($u->isConnected(7,2));
        self::assertTrue($u->isConnected(1,2));

        $u->union(3,5);
        $u->union(5,6);
        $u->union(5,1);
        self::assertTrue($u->isConnected(3,7));
    }
}
