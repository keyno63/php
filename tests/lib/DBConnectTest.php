<?php


namespace MyApp\lib;

require_once "/opt/project/src/lib/DBConnect.php";

use PHPUnit\Framework\TestCase;
use PDO;
use PDOStatement;
use IteratorAggregate;
use ArrayIterator;
use DBConnect;

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

        $stub->method('prepare')
            ->willReturn(new class extends PDOStatement {
                function execute($input_parameters = null)
                {
                    return true;
                }
            });

        $stub->method('query')
            ->willReturn(new class extends PDOStatement implements IteratorAggregate {
                function getIterator()
                {
                    return new ArrayIterator([
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
                }
            });
        $this->stub = $stub;
    }

    /**
     * @test
     */
    public function PDOのテスト()
    {
        $target = new DBConnect("sample", "user", "pass", $this->stub);
        $ret = $target->select();

        $this->assertEquals("apple\tred\t150\n", $ret[0]);
        $this->assertEquals("banana\tyellow\t250\n", $ret[1]);
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