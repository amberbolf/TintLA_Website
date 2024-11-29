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
   car_year INT,
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
   first_name VARCHAR(50),
   last_name VARCHAR(50),
   email VARCHAR(100),
   phone_num VARCHAR(15),
   car_make VARCHAR(50),
   car_model VARCHAR(50),
   car_year INT,
   tint_type VARCHAR(50),
   quoted_price FLOAT
)";
if ($conn->query($sql) === TRUE) {
   echo "Table 'customers' created successfully.<br>";
} else {
   die("Error creating table 'customers': " . $conn->error);
}

// Create 'inquiries' table
$sql = "CREATE TABLE IF NOT EXISTS inquiries (
   first_name VARCHAR(50),
   last_name VARCHAR(50),
   phone_num VARCHAR(15),
   email VARCHAR(100),
   date_submitted DATE,
   inquiry_message TEXT
)";
if ($conn->query($sql) === TRUE) {
   echo "Table 'inquiries' created successfully.<br>";
} else {
   die("Error creating table 'inquiries': " . $conn->error);
}

// Create 'admin' table
$sql = "CREATE TABLE IF NOT EXISTS admin (
   admin_id INT PRIMARY KEY,
   username VARCHAR(50),
   password VARCHAR(255)
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

// Populate 'auto' table from CSV
$csvFile = "PRICES_FINAL.csv";
if (file_exists($csvFile)) {
   if (($handle = fopen($csvFile, "r")) !== FALSE) {
       // Skip the first line
       fgetcsv($handle);

       // Prepare insert statement
       $stmt = $conn->prepare("INSERT INTO auto (car_year, car_make, car_model, full_carbon, full_ceramic, front_carbon, front_ceramic, back_carbon, back_ceramic) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmt->bind_param("issdddddd", $car_year, $car_make, $car_model, $full_carbon, $full_ceramic, $front_carbon, $front_ceramic, $back_carbon, $back_ceramic);

       while (($data = fgetcsv($handle)) !== FALSE) {
           // Assign values from CSV
           $car_year = (int)$data[0];
           $car_make = $data[1];
           $car_model = $data[2];
           $full_carbon = (float)$data[3];
           $full_ceramic = (float)$data[4];
           $front_carbon = (float)$data[5];
           $front_ceramic = (float)$data[6];
           $back_carbon = (float)$data[7];
           $back_ceramic = (float)$data[8];

           // Execute the statement
           $stmt->execute();
       }

       fclose($handle);
       $stmt->close();
       echo "Data from CSV file inserted into 'auto' table.<br>";
   } else {
       echo "Error opening CSV file.<br>";
   }
} else {
   echo "CSV file 'PRICES_FINAL.csv' not found.<br>";
}

// Close connection
$conn->close();
?>