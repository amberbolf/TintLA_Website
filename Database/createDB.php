<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Adjust if you have a different username
$password = ""; // Adjust if you have a password
$dbname = "tintla_database";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully.<br>";
} else {
  die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create 'auto' table
$sql = "CREATE TABLE IF NOT EXISTS auto (
  auto_id INT PRIMARY KEY,
  car_year VARCHAR(10),
  car_make VARCHAR(50),
  car_model VARCHAR(50),
  full_carbon FLOAT,
  full_ceramic FLOAT,
  front_carbon FLOAT,
  front_ceramic FLOAT,
  back_carbon FLOAT,
  back_ceramic FLOAT
)";
if ($conn->query($sql) === TRUE) {
  echo "Table 'auto' created successfully.<br>";
} else {
  die("Error creating table 'auto': " . $conn->error);
}

// Create 'customers' table
$sql = "CREATE TABLE IF NOT EXISTS customers (
  customer_id INT PRIMARY KEY,
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  email VARCHAR(100),
  phone_num VARCHAR(15),
  car_make VARCHAR(50),
  car_model VARCHAR(50),
  car_year INT,
  tint_type VARCHAR(50),
  tint_coverage VARCHAR(50),
  quoted_price FLOAT
)";
if ($conn->query($sql) === TRUE) {
  echo "Table 'customers' created successfully.<br>";
} else {
  die("Error creating table 'customers': " . $conn->error);
}

// Create 'inquiries' table
$sql = "CREATE TABLE IF NOT EXISTS inquiries (
  inquiry_id INT PRIMARY KEY,
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  phone_num VARCHAR(15),
  email VARCHAR(100),
  date_submitted DATETIME,
  inquiry_message TEXT
)";
if ($conn->query($sql) === TRUE) {
  echo "Table 'inquiries' created successfully.<br>";
} else {
  die("Error creating table 'inquiries': " . $conn->error);
}

// Create 'admin' table
$sql = "CREATE TABLE IF NOT EXISTS admin (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo "Table 'admin' created successfully.<br>";
} else {
  die("Error creating table 'admin': " . $conn->error);
}

// Insert default admin record
$sql = "INSERT INTO admin (admin_id, username, password) 
      VALUES (1, 'admin', 'tintla123')
      ON DUPLICATE KEY UPDATE username='admin', password='tintla123'";
if ($conn->query($sql) === TRUE) {
  echo "Default admin record added successfully.<br>";
} else {
  die("Error inserting admin record: " . $conn->error);
}

// Close connection
$conn->close();

session_start();
session_destroy(); 
header("Location: home.php"); 
exit();
?>
