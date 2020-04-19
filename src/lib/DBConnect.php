<?php

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
     * @var string
     */
    private string $dbh;

    public function __construct($dns, $user, $pass, $dbh = null)
    {
        $this->dsn = $dns;
        $this->user = $user;
        $this->pass = $pass;

        $this->dbh = $dbh ?? new PDO($this->dsn, $this->user, $this->pass);
    }
}