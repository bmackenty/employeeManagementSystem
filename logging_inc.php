<?php 

// Include the external file with MySQL connection parameters
require_once('database_inc.php');

// Define the Logger class
class Logger {



  
  // Private properties for the MySQL connection
  private $conn;
  private $table;
  
  // Constructor function to initialize the MySQL connection
  public function __construct($mysql_connect, $table_name) {
    $this->conn = $mysql_connect;
    $this->table = $table_name;
  }
  
  // Public function to log messages to the database
  public function log($message) {
    // Sanitize the message
    $message = mysqli_real_escape_string($this->conn, $message);
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $ip_address = mysqli_real_escape_string($this->conn, $ip_address);
    
    // Create the SQL query
    $sql = "INSERT INTO $this->table (message,date,ip) VALUES ('$message',NOW(),'$ip_address')";
    
    // Execute the query
    if (mysqli_query($this->conn, $sql)) {
      return true;
    } else {
      return false;
    }
  }
  
}

// Instantiate the Logger object with the MySQL connection parameters
$logger = new Logger($mysql_connect, 'logs');

?>