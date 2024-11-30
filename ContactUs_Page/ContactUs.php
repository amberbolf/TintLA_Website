<?php
// database1 connection
$servername = "localhost";
$username = "root";
$password = "";
$databaseName="tintla_database";

$conn = new mysqli($servername, $username, $password,$databaseName);

// checks connection
if ($conn->connect_error) {
	die("connection failed". $conn->connect_error);
}

// handles form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // retrieves form data
    //$id = $_POST['id'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $inquiry_message = $_POST['inquiry'];

    // data into database
    $sql = "INSERT INTO inquiries (first_name, last_name, email, phone_num, date_submitted, inquiry_message) 
            VALUES ('$firstname', '$lastname','$email', '$phone_num', NOW(), '$inquiry_message')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Inquiry Sent Successfully!";
        $last_id = $conn->insert_id;
    } else {
        $error_message = "Inquiry Unsuccessful!";
    }
}

/*
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
            echo "<td>".$row["date_submitted"]."</td>"; 
            echo "<td>".$row["inquiry_message"]."</td>";
            echo "</tr>"; 
        } 
        echo "</table";
    } else {
        echo "No results found";
    }
} else {
    echo "No new record found";
}

*/

?>

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
            background-color: white;
            color: black;
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
            margin: 0 45px;
        }
        nav ul li a {
            color: black;
            font-weight: bold;
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
            border: 5px solid #333;
            text-align: center;
            margin-bottom: 40px;
            background-color: #0F49B8;
            color: white;
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
        .button-1 {
        background-color: #0F49B8;
        border-radius: 8px;
        border-style: none;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        height: 60px;
        width: 150px;
        line-height: 20px;
        list-style: none;
        margin: 0;
        outline: none;
        padding: 10px 20px;
        position: relative;
        text-align: center;
        text-decoration: none;
        transition: color 100ms;
        vertical-align: center;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-1:hover,
        .button-1:focus {
        background-color: #999;
        }
        .button-wrapper {
        text-align: center;
        margin-top: 20px;
        }
        footer{
            background-color: #333;
            color: white;
            padding: 10px 0;
            align-items: center;                  
            display: flex;
            text-align: center;       
        }
        label {
        text-align: left; 
        }
        input {
        width: 98%; 
        }
        .error-message {
            color: red;
            font-size: 0.9em;
        }
        .success-message {
            color: green;
            font-size: 0.9em;
        }
    </style>

</head>

<body>
    <div style="padding-left: 10px; padding-right: 10px; display: flex; justify-content: space-between; background-color: #0F49B8">
    <p style="font-size:small; flex-basis: 49.5%; color: white;">San Fernando Valley 818-200-6657 | San Gabriel Valley 626-548-4683</p>
    <a style="text-decoration: none; padding-top: 12px; font-size:small; flex-basis: 49.5%; color: white; text-align: right;" href="https://www.facebook.com/shoptintla/">Check Out Our Facebook!</a>
    </div>
    <div class="container1">
    <header>
        <div class = "logo">
            <a href="/TintLA_Website/Home_Page/Home.php">
                <img src="tintla_logo.png" alt="TINTLA">
            </a>
        </div>
            <nav>
                <ul>
                    <li><a href="/TintLA_Website/Automotive_Page/AutomotiveTinting.php">Automotive Tinting</a></li>
                    <li><a href="/TintLA_Website/Commercial_Page/CommercialTinting.php">Commercial Tinting</a></li>
                    <li><a href="/TintLA_Website/Residential_Page/ResidentialTinting.php">Residential Tinting</a></li>
                    <li><a href="/TintLA_Website/TintworkFilm_Page/TintworkFilm.php">Tintwork Film</a></li>
                    <li><a href="/TintLA_Website/PhotoGallery_Page/TintingPhotoGallery.php">Tinting Photo Gallery</a></li>
                    <li><a href="/TintLA_Website/ContactUs_Page/ContactUs.php">Contact Us</a></li>
                </ul>
            </nav>
    </header>
    </div>

    <div class = "container1">  
            <section class="section-center-boarder-top">
                <h1>CONTACT US</h1>
                <hr style="width: 80%">
                <br>
                <p style= "font-size: 18px; color:white">To get a quick quote for Automotive tinting, fill out your <br>
                information on our  
                <a style="color: white; font-weight: bold;" href="/TintLA_Website/QuoteTool_Page/quote_tool.php">Quoting Tool.</a><br><br><br>
                To get a quote for Commercial or Residential tinting, or if you have other inquiries, <br>fill out you information below.
                </p>
            </section>
    </div>

    <div class="container2">
    <section class="section-left-boarder">
        <form action="ContactUs.php" method="post">
            <label for="first name"><b>First Name:</b></label> <br>
            <input type="text" id="first_name" name="first_name" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>

            <label id="last_name" for="last name"><b>Last Name:</b></label> <br>
            <input type="text" id="last_name" name="last_name" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>

            <label for="email"><b>Email:</b></label> <br>
            <input type="email" id="email" name="email" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>

            <label for="phone_num"><b>Phone Number:</b></label> <br>
            <input type="text" id="phone_num" name="phone_num" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>
            
            <label for="inquiry"><b>Questions Or Message:</b></label> <br>
            <textarea id="inquiry" name="inquiry" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; width: 98%; height: 105px;"required></textarea>
            
            <div class="button-wrapper">
            <button style="box-shadow: 0 4px #999;" class="button-1" role="button">Submit</button>
            <br>
            <br>
            <?php

                if (isset($error_message)) {
                    echo '<p class="error-message">' . $error_message . '</p>';
                }
            ?>
            <?php
                if (isset($success_message)) {
                    echo '<p class="success-message">Inquiry Sent Successfully!</p>';
                }
            ?>
            </div>
            
        </form>
    </section>
    </div>
    <div class="container1">
        <header style="background-color: #0F49B8; color: white;">
            <div class = "logo">
                <a href="/TintLA_Website/Home_Page/Home.php">
                    <img src="tintla_logo.png" alt="Tintla_logo">
                </a>
            </div>
            <nav>
                <ul>
                <li><a style="color:white;"href="/TintLA_Website/Automotive_Page/AutomotiveTinting.php">Automotive Tinting</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/Commercial_Page/CommercialTinting.php">Commercial Tinting</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/Residential_Page/ResidentialTinting.php">Residential Tinting</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/TintworkFilm_Page/TintworkFilm.php">Tintwork Film</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/PhotoGallery_Page/TintingPhotoGallery.php">Tinting Photo Gallery</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/ContactUs_Page/ContactUs.php">Contact Us</a></li>
                </ul>
            </nav>
        </header>

        <footer>
            <p style="padding: 10px;">&copy; Now serving Los Angeles and all the surrounding suburbs. Give us a call at 626.548.4683 (San Gabriel Valley) or 818.200.6657 (San Fernando Valley or Los Angeles) to schedule your appointment now.
            Same day service, quality work, we tint any make and model of vehicle and only the best quality in film brands with a lifetime warranty.</p>
        </footer>
    </div>    
</body>



