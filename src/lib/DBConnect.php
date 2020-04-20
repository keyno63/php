<?php

namespace MyApp\lib;

use PDO;
use PDOStatement;

class DBConnect
{
    /**
     * @var string
     */
    private string $dsn;
    /**
     * @var string
     */
    private string $user;
    /**
     * @var string
     */
    private string $pass;
    /**
     * @var PDO
     */
    private PDO $dbh;
    /**
     * @var PDOStatement
     */
    private PDOStatement $state;

    public function __construct($dns, $user, $pass, $dbh = null)
    {
        $this->dsn = $dns;
        $this->user = $user;
        $this->pass = $pass;

        $this->dbh = $dbh ?? new PDO($this->dsn, $this->user, $this->pass);
    }

    public function select()
    {
        $sql = "SELECT * FROM table";
        $result = false;
        try {
            $state = $this->dbh->prepare($sql);
            $result = $state->execute();
            $this->state = $state;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function query()
    {
        return $this->state->fetchAll(PDO::FETCH_ASSOC);
    }
}