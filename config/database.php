<?php
class Database
{
    private $host = "studentmysql.miun.se";
    private $db_name = "anst9000";
    private $username = "anst9000";
    private $password = "52j0q658";
    private $port = "3306";

    // private $host = "localhost";
    // private $db_name = "webbutv_moment5";
    // private $username = "root";
    // private $password = "";
    // private $port = "80";

    private $dsn;
    public $conn;

    // get the database connection
    public function connect()
    {
        $this->conn = null;
        $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
