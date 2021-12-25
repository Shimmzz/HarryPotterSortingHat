<?php
class Database {
    // properties
    private $hostname;
    private $user;
    private $password;
    private $database;
    private $port;
    public $connection;

    // constructor
    function __construct($hostname, $user, $password, $database, $port)
    {
        // add data to the props
        //gebeurt wanneer je die megeeft in andere file, ze worde ndan ook globaal aangepast in de klasse
        $this->hostname = $hostname;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;

        // connection with database 
        $this->connectToDatabase();
    }

    // methods
    function connectToDatabase() {
        // connection maken
        $conn = mysqli_connect($this->hostname, $this->user, $this->password, $this->database, $this->port);

        if ($conn == false) {
            echo "geen database connectie";
            die();
        }

        // property overschrijven met de $conn object
        $this->connection = $conn;
    }

    //alle queries, aangepast zodat ze kloppen voor de klasse
    //= methods nu 
    function getQuery($query) {
        return mysqli_query($this->connection, $query)->fetch_all(MYSQLI_ASSOC);
    }
    
    function insertQuery($query) {
        mysqli_query($this->connection, $query);
    }

    //connection sluiten
    function closeConnection() {
        $this->connection->close();
    }
}