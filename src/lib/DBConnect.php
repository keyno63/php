<?php

namespace MyApp\lib;

use PDO;

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
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $result;
    }
}