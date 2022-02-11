<?php

class Controller
{
    private $query,$connection;

    public function view($path = '')
    {
        require_once __DIR__.'/../views/'.$path;
    }

    public function sql($queryString = "")
    {
        $this->query = $queryString;
        return $this;
    }

    public function execute()
    {
        $connection = $this->connect();
        return $connection->query($this->query);
    }

    public function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        // Create connection
        $connection = new mysqli($servername, $username, $password);
        
        // Check connection
        if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
}

?>