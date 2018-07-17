<?php
class DBController
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "bookbid";

    public function __construct()
    {
        $conn = $this->connectDB();
        if (!empty($conn)) {
            $this->selectDB($conn);
        }
    }

    public function connectDB()
    {
        $conn = mysql_connect($this->host, $this->user, $this->password);
        return $conn;
    }

    public function selectDB($conn)
    {
        mysql_select_db($this->database, $conn);
    }

    public function runQuery($query)
    {
        $result = mysql_query($query);
        while ($row=mysql_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) {
            return $resultset;
        }
    }

    public function numRows($query)
    {
        $result  = mysql_query($query);
        $rowcount = mysql_num_rows($result);
        return $rowcount;
    }
}
