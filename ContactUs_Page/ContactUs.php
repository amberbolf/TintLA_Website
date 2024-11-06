<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TintLA</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: flex-start;
            margin: 0;
        }
        .container1 {
            width: 100%;
            margin: 0 auto;
        }
        .container2 {
            width: 80%;
            margin: 0 auto;
        }
        .container3 {
            width: 60%;
            margin: 0 auto;
        }
        .container3-blue {
            width: 60%;
            margin: 0 auto;
            /*background-color: */
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .logo {
            margin-left: 20px;
            font-size: 24px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin-right: 20px;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        main {
            text-align: left;
            padding: 20px;
        }

        /**/ 
        .section-left {
            text-align: left;
            margin-bottom: 50px;
        }
        .section-left-boarder {
            text-align: left;
            margin-bottom: 50px;
            border: 5px solid #ddd; 
            padding: 10px;
        }
        .section-center {
            text-align: center;
            margin-bottom: 80px;
        }
        .section-center-boarder {
            text-align: center;
            margin-bottom: 80px;
            border: 5px solid #ddd; 
            padding: 10px;
        }
        .section-center-boarder-top {
            text-align: center;
            margin-bottom: 40px;
            border: 5px solid #ddd; 
            padding: 10px;
        }
        .section-right {
            text-align: right;
        }
        /**/

        .button {
            display: inline-block;
            padding: 10px 20px;
            fontsize: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px #999;
        }
        .button:hover{
            background-color: 3e8341
        }
        .button:active{
            background-color: #3e8341;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        footer{
            background-color: #333;
            color: white;
            padding: 10px 0;
            align-items: center;                  
            display: flex;       
        }
    </style>

</head>

<body>
    <div class="container1">
    <header>
        <div class = "logo">
            <a href="/TintLA_Website/Home_Page/Home.php">
                <img src="tintla_logo.png" alt="TINTLA">
            </a>
        </div>
            <nav>
                <ul>
                    <li><a href="/TintLA_Website/Automotive_Page/AutomotiveTinting.php">Automototive Tinting</a></li>
                    <li><a href="/TintLA_Website/Commercial_Page/CommercialTinting.php">Commercial Tinting</a></li>
                    <li><a href="/TintLA_Website/Residential_Page/ResidentialTinting.php">Residential Tinting</a></li>
                    <li><a href="/TintLA_Website/TintworkFilm_Page/TintworkFilm.php">Tintwork Film</a></li>
                    <li><a href="/TintLA_Website/PhotoGallery_Page/TintingPhotoGallery.php">Tinting Photo Gallery</a></li>
                    <li><a href="/TintLA_Website/ContactUs_Page/ContactUs.php">Contact Us</a></li>
                    >Facebook Link<
                </ul>
            </nav>
    </header>
    </div>

    <div class = "container1">  
            <section class="section-center-boarder-top">
                <h1>CONTACT US</h1>
            </section>
    </div>

    <div class="container1">
    <section class="section-left-boarder">
        <form action="ContactUs.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" maxlength="50" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" maxlength="100" required><br><br>

            <label for="phone_num">Phone Number:</label>
            <input type="text" id="phone_num" name="phone_num" required><br><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" maxlength="50" required><br><br>

            <label for="preferred_contact">Preferred Contact:</label>
            <input type="text" id="preferred_contact" name="preferred_contact" maxlength="20" required><br><br>

            <label for="car_make">Car Make:</label>
            <input type="text" id="car_make" name="car_make" maxlength="50" required><br><br>

            <label for="car_model">Car Model:</label>
            <input type="text" id="car_model" name="car_model" maxlength="50" required><br><br>

            <label for="car_year">Car Year:</label>
            <input type="number" id="car_year" name="car_year" required><br><br>

            <input type="submit" class="button" value="Submit">

            <a href="/TintLA_Website/QuoteOutput_Page/QuoteOutput.php" class="button"> Take Me To My Quote </a>
        </form>
    </section>
    </div>
</body>


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
echo "Connected<br>";

// handles form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // retrieves form data
    //$id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $preferred_contact = $_POST['preferred_contact'];
    $car_make = $_POST['car_make'];
    $car_model = $_POST['car_model'];
    $car_year = $_POST['car_year'];

    // data into database
    $sql = "INSERT INTO customers (name, email, phone_num, city, preferred_contact, car_make, car_model, car_year) 
            VALUES ('$name', '$email', '$phone_num', '$city', '$preferred_contact', '$car_make', '$car_model', '$car_year')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $last_id = $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// retrieves the most recent submission 
if (isset($last_id)) { 
    $sql = "SELECT * FROM customers WHERE id = $last_id"; 
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
            echo "<td>".$row["state"]."</td>";
            echo "<td>".$row["preferred_contact"]."</td>"; 
            echo "<td>".$row["car_make"]."</td>"; 
            echo "<td>".$row["car_model"]."</td>"; 
            echo "<td>".$row["car_year"]."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table";
    } else {
        echo "No results found";
    }
} else {
    echo "No new record found";
}



?>
