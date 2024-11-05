//QUOTE OUTPUT//

<?php

// database1 connection
$servername = "localhost";
$username = "root";
$password = "";
$databaseName="database1";

$conn = new mysqli($servername, $username, $password,$databaseName);

// checks connection
if ($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}
echo "connected";

// handles form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // retrieves form data
    //$id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $city = $_POST['city'];
    $preferred_contact = $_POST['preferred_contact'];
    $car_make = $_POST['car_make'];
    $car_model = $_POST['car_model'];
    $car_year = $_POST['car_year'];

    // data into database
    $sql = "INSERT INTO customers (name, email, phone_num, city, preferred_contact, car_make, car_model, car_year) 
            VALUES ('$name', '$email', '$phone_num', '$city', '$preferred_contact', '$car_make', '$car_model', '$car_year')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// retrieves customer data from database1
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["phone_num"]."</td>";
        echo "<td>".$row["city"]."</td>";
        echo "<td>".$row["preferred_contact"]."</td>";
        echo "<td>".$row["car_make"]."</td>";
        echo "<td>".$row["car_model"]."</td>";
        echo "<td>".$row["car_year"]."</td>";
        echo "</tr>";
	}
}
?>