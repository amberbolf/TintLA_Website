<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Database connection
$host = "localhost"; // Replace with your database host
$username = "root";  // Replace with your database username
$password = "";      // Replace with your database password
$dbname = "tintla_database"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch distinct makes and models first
$makes = $conn->query("SELECT DISTINCT car_make FROM auto WHERE car_make IS NOT NULL ORDER BY car_make ASC");
$models = null;
$years = null;

// Fetch models based on selected make
if (isset($_POST['car_make']) && $_POST['car_make'] !== "") {
    $make = $_POST['car_make'];
    $models = $conn->query("SELECT DISTINCT car_model FROM auto WHERE car_make = '$make' AND car_model IS NOT NULL ORDER BY car_model ASC");
    
}

// Fetch years based on selected make and model
if (isset($_POST['car_model']) && $_POST['car_model'] !== "" ) {
    $model = $_POST['car_model'];
    $years = $conn->query("SELECT DISTINCT car_year FROM auto WHERE car_make = '$make' AND car_model = '$model' AND car_year IS NOT NULL ORDER BY car_year DESC");
    
}

// Handle form submission for updating price
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_type'])) {
    $update_type = $_POST['update_type']; // Carbon, Ceramic, or Both
    $year = $_POST['car_year'] ?? null;
    $success_message = $error_message = "";

    // Prepare and validate input fields based on selected type
    $prices = [];
    if ($update_type === "carbon" || $update_type === "both") {
        $prices['price_carbon'] = $_POST['price_carbon'] ?? null;
        $prices['front_carbon'] = $_POST['front_carbon'] ?? null;
        $prices['back_carbon'] = $_POST['back_carbon'] ?? null;

        foreach ($prices as $key => $price) {
            if (!is_numeric($price)) {
                $error_message = "Please enter valid numbers for carbon prices.";
            }
        }
    }

    if ($update_type === "ceramic" || $update_type === "both") {
        $prices['price_ceramic'] = $_POST['price_ceramic'] ?? null;
        $prices['front_ceramic'] = $_POST['front_ceramic'] ?? null;
        $prices['back_ceramic'] = $_POST['back_ceramic'] ?? null;

        foreach ($prices as $key => $price) {
            if (!is_numeric($price)) {
                $error_message = "Please enter valid numbers for ceramic prices.";
                echo "here 1";
            }
        }
    }

    // If no errors, update the database
    if (empty($error_message) &&  ($update_type==='carbon' OR $update_type==='ceramic' OR $update_type==='both')) {
        foreach ($prices as $type => $price) {
            echo "<br><br><br><br><br><br>here 2<br>";
            if ($price !== null) {
                $stmt = $conn->prepare(
                    "UPDATE auto SET $type = ? WHERE car_make = ? AND car_model = ?" . ($car_year ? " AND car_year = ?" : "")
                );
                if ($year) {
                    $stmt->bind_param("dsss", $price, $make, $model, $year);
                } else {
                    $stmt->bind_param("dss", $price, $make, $model);
                }

                if (!$stmt->execute()) {
                    $error_message = "Error updating price for $type: " . $conn->error;
                }
                $stmt->close();
            }
        }
        if (empty($error_message)) {
            $success_message = "Prices updated successfully!";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pricing</title>
    <style>
        body {
            background-color: blue;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            color: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .back-button {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input[type="submit"] {
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background: darkblue;
        }
        .message {
            font-weight: bold;
            margin-top: 10px;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
        }
    </style>
</head>
<body>
<a href="admin.php" class="back-button">← Back to Admin</a>
    <div class="container">
        <h1>Edit Pricing</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="car_make">Vehicle Make:</label>
                <select name="car_make" id="car_make" required onchange="this.form.submit()">
                    <option value="">Select Make</option>
                    <?php while ($row = $makes->fetch_assoc()): ?>
                        <option value="<?= $row['car_make'] ?>" <?= isset($make) && $make === $row['car_make'] ? 'selected' : '' ?>>
                            <?= $row['car_make'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <?php if ($models): ?>
            <div class="form-group">
                <label for="car_model">Vehicle Model:</label>
                <select name="car_model" id="car_model" required onchange="this.form.submit()">
                    <option value="">Select Model</option>
                    <?php while ($row = $models->fetch_assoc()): ?>
                        <option value="<?= $row['car_model'] ?>" <?= isset($model) && $model === $row['car_model'] ? 'selected' : '' ?>>
                            <?= $row['car_model'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <?php endif; ?>

            <?php if ($years != "" OR $years != " " OR $years != NULL): ?>
            <div class="form-group">
                <label for="car_year">Vehicle Year:</label>
                <select name="car_year" id="car_year" required>
                    <option value="">Select Year or Other</option>
                    <?php while ($row = $years->fetch_assoc()): ?>
                        <option value="<?= $row['car_year'] ?>" <?= isset($year) && $year === $row['car_year'] ? 'selected' : '' ?>>
                            <?= $row['car_year'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="update_type">Tint Type:</label>
                <select name="update_type" id="update_type" required onchange="this.form.submit()">
                    <option value="">Select Type</option>
                    <option value="carbon" <?= isset($update_type) && $update_type === "carbon" ? 'selected' : '' ?>>Carbon</option>
                    <option value="ceramic" <?= isset($update_type) && $update_type === "ceramic" ? 'selected' : '' ?>>Ceramic</option>
                    <option value="both" <?= isset($update_type) && $update_type === "both" ? 'selected' : '' ?>>Both</option>
                </select>
            </div>

            <?php if (isset($update_type) && ($update_type === "carbon" || $update_type === "both")): ?>
                <div class="form-group">
                    <label for="price_carbon">New Price (Carbon Full):</label>
                    <input type="text" name="price_carbon" id="price_carbon">
                </div>
                <div class="form-group">
                    <label for="front_carbon">New Price (Carbon Front):</label>
                    <input type="text" name="front_carbon" id="front_carbon">
                </div>
                <div class="form-group">
                    <label for="back_carbon">New Price (Carbon Back):</label>
                    <input type="text" name="back_caron" id="back_carbon">
                </div>
            <?php endif; ?>

            <?php if (isset($update_type) && ($update_type === "ceramic" || $update_type === "both")): ?>
                <div class="form-group">
                    <label for="price_ceramic">New Price (Ceramic Full):</label>
                    <input type="text" name="price_ceramic" id="price_ceramic">
                </div>
                <div class="form-group">
                    <label for="front_ceramic">New Price (Ceramic Front):</label>
                    <input type="text" name="front_ceramic" id="front_ceramic">
                </div>
                <div class="form-group">
                    <label for="back_ceramic">New Price (Ceramic Back):</label>
                    <input type="text" name="back_ceramic" id="back_ceramic">
                </div>
            <?php endif; ?>

            <div class="form-group">
                <input type="submit" value="Update Price">
            </div>
        </form>

        <?php if (isset($success_message)): ?>
            <p class="message success"><?= $success_message ?></p>
        <?php elseif (isset($error_message)): ?>
            <p class="message error"><?= $error_message ?></p>
        <?php endif; ?>
    </div>
</body>
</html>