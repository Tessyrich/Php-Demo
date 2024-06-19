<?php
class Connection {
    protected $hostname;
    protected $databaseName;
    protected $dbUsername;
    protected $dbPassword;
    protected $conn;

    public function __construct() {
        $this->hostname = "localhost";
        $this->databaseName = "pet";
        $this->dbUsername = "root";
        $this->dbPassword = "";  
    }

    public function connect() {
        
        // Connect to MySQL server without specifying the database
        $this->conn = mysqli_connect($this->hostname, $this->dbUsername, $this->dbPassword);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create database if it doesn't exist
        $sql = "CREATE DATABASE IF NOT EXISTS $this->databaseName";
        if (!mysqli_query($this->conn, $sql)) {
            die("Error creating database: " . mysqli_error($this->conn));
        }

        // Select the database
        if (!mysqli_select_db($this->conn, $this->databaseName)) {
            die("Error selecting database: " . mysqli_error($this->conn));
        }

        // Create table if it doesn't exist
        $query = "CREATE TABLE IF NOT EXISTS users (
            id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            email VARCHAR(50) NOT NULL,
            password VARCHAR(200) NOT NULL
        )";
        if (!mysqli_query($this->conn, $query)) {
            die("Error creating table: " . mysqli_error($this->conn));
        }

        return $this->conn;
    }
}
?>
