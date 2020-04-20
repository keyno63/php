<?php


namespace MyApp\lib;

use PHPUnit\Framework\TestCase;
use PDO;
use PDOStatement;

class DBConnectTest extends TestCase
{
    private $stub;

    public function setUp(): void
    {
        $stub = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $stubstate = $this->getMockBuilder(PDOStatement::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();
        $stubstate->method('execute')
            ->willReturn(true);
        $stubstate->method('fetchAll')
            ->willReturn([
                [
                    'name' => 'apple',
                    'color' => 'red',
                    'calories' => 150,
                ],
                [
                    'name' => 'banana',
                    'color' => 'yellow',
                    'calories' => 250,
                ],
            ]);

        $stub->method('prepare')
            ->willReturn($stubstate);

        $this->stub = $stub;
    }

    /**
     * @test
     */
    public function PDOのテスト()
    {
        $target = new DBConnect("sample", "user", "pass", $this->stub);
        $ret = $target->select();
        $row = $target->query();

        echo "query row:" . PHP_EOL;
        var_dump($row);
        $this->assertEquals([
            'name' => 'apple',
            'color' => 'red',
            'calories' => 150,
        ], $row[0]);
        $this->assertEquals([
            'name' => 'banana',
            'color' => 'yellow',
            'calories' => 250,
        ], $row[1]);
        $this->assertEquals(true, $ret);
    }


    /*
     * @test
     */
    public function test()
    {
        $this->assertEquals(true, true);
    }
}