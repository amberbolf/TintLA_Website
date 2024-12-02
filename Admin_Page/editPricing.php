<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminLogin.php");
    exit();
}

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tintla_database";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch distinct makes
$makes = $conn->query("SELECT DISTINCT car_make FROM auto WHERE car_make IS NOT NULL ORDER BY car_make ASC");

// Handle AJAX requests for models and years
if (isset($_GET['action']) && $_GET['action'] === 'get_models' && isset($_GET['make'])) {
    $make = $conn->real_escape_string($_GET['make']);
    $models = $conn->query("SELECT DISTINCT car_model FROM auto WHERE car_make = '$make' ORDER BY car_model ASC");
    $model_options = [];
    while ($row = $models->fetch_assoc()) {
        $model_options[] = $row['car_model'];
    }
    echo json_encode($model_options);
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'get_years' && isset($_GET['make'], $_GET['model'])) {
    $make = $conn->real_escape_string($_GET['make']);
    $model = $conn->real_escape_string($_GET['model']);
    $years = $conn->query("SELECT DISTINCT car_year FROM auto WHERE car_make = '$make' AND car_model = '$model' ORDER BY car_year DESC");
    $year_options = [];
    while ($row = $years->fetch_assoc()) {
        $year_options[] = $row['car_year'];
    }
    echo json_encode($year_options);
    exit();
}

$error_message = "";
$success_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $make = $_POST['car_make'] ?? '';
    $model = $_POST['car_model'] ?? '';
    $year = $_POST['car_year'] ?? '';
    $update_type = $_POST['update_type'] ?? '';

    // Validate inputs
    if (!$make || !$model || !$year || !$update_type) {
        $error_message = "Please ensure all fields (Make, Model, Year, and Update Type) are selected.";
    } else {
        $prices = [];

        if ($update_type === "carbon" || $update_type === "both") {
            $prices['full_carbon'] = $_POST['full_carbon'] ?? null;
            $prices['front_carbon'] = $_POST['front_carbon'] ?? null;
            $prices['back_carbon'] = $_POST['back_carbon'] ?? null;
        }

        if ($update_type === "ceramic" || $update_type === "both") {
            $prices['full_ceramic'] = $_POST['full_ceramic'] ?? null;
            $prices['front_ceramic'] = $_POST['front_ceramic'] ?? null;
            $prices['back_ceramic'] = $_POST['back_ceramic'] ?? null;
        }

        foreach ($prices as $key => $price) {
            if ($price === null || $price === "") {
                $error_message = "Please ensure all price fields are filled.";
                break;
            }
            if (!is_numeric($price)) {
                $error_message = "Please enter valid numeric values for all prices.";
                break;
            }
        }

        if (empty($error_message)) {
            foreach ($prices as $field => $price) {
                if ($price !== null) {
                    $query = "UPDATE auto SET $field = ? WHERE car_make = ? AND car_model = ? AND car_year = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("dsss", $price, $make, $model, $year);

                    if (!$stmt->execute()) {
                        $error_message = "Error updating price for $field: " . $conn->error;
                        break;
                    }
                    $stmt->close();
                }
            }

            if (empty($error_message)) {
                $success_message = "Prices updated successfully!";
            }
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
        .form-group select, .form-group input {
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
        .price-fields {
            display: none;
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
    <script>
        function updateModels() {
            const make = document.getElementById('car_make').value;
            const modelDropdown = document.getElementById('car_model');
            const yearDropdown = document.getElementById('car_year');
            modelDropdown.innerHTML = '<option value="">Loading models...</option>';
            yearDropdown.innerHTML = '<option value="">Select Model first</option>';
            
            if (make) {
                fetch(`?action=get_models&make=${make}`)
                    .then(response => response.json())
                    .then(models => {
                        modelDropdown.innerHTML = '<option value="">Select Model</option>';
                        models.forEach(model => {
                            modelDropdown.innerHTML += `<option value="${model}">${model}</option>`;
                        });
                    });
            } else {
                modelDropdown.innerHTML = '<option value="">Select Make first</option>';
            }
        }

        function updateYears() {
            const make = document.getElementById('car_make').value;
            const model = document.getElementById('car_model').value;
            const yearDropdown = document.getElementById('car_year');
            yearDropdown.innerHTML = '<option value="">Loading years...</option>';

            if (make && model) {
                fetch(`?action=get_years&make=${make}&model=${model}`)
                    .then(response => response.json())
                    .then(years => {
                        yearDropdown.innerHTML = '<option value="">Select Year or Other</option>';
                        years.forEach(year => {
                            yearDropdown.innerHTML += `<option value="${year}">${year}</option>`;
                        });
                    });
            } else {
                yearDropdown.innerHTML = '<option value="">Select Model first</option>';
            }
        }

        function updatePriceFields() {
            const type = document.getElementById('update_type').value;
            document.querySelectorAll('.price-fields').forEach(fieldset => fieldset.style.display = 'none');

            if (type === 'carbon' || type === 'both') {
                document.getElementById('carbon-fields').style.display = 'block';
            }
            if (type === 'ceramic' || type === 'both') {
                document.getElementById('ceramic-fields').style.display = 'block';
            }
        }
    </script>
</head>
<body>
<a href="admin.php" class="back-button">← Back to Admin</a>
    <div class="container">
        <h1>Edit Pricing</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="car_make">Vehicle Make:</label>
                <select name="car_make" id="car_make" onchange="updateModels()" required>
                    <option value="">Select Make</option>
                    <?php while ($row = $makes->fetch_assoc()): ?>
                        <option value="<?= $row['car_make'] ?>"><?= $row['car_make'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="car_model">Vehicle Model:</label>
                <select name="car_model" id="car_model" onchange="updateYears()" required>
                    <option value="">Select Make first</option>
                </select>
            </div>
            <div class="form-group">
                <label for="car_year">Vehicle Year:</label>
                <select name="car_year" id="car_year" required>
                    <option value="">Select Model first</option>
                </select>
            </div>
            <div class="form-group">
                <label for="update_type">Tint Type:</label>
                <select name="update_type" id="update_type" onchange="updatePriceFields()" required>
                    <option value="">Select Type</option>
                    <option value="carbon">Carbon</option>
                    <option value="ceramic">Ceramic</option>
                    <option value="both">Both</option>
                </select>
            </div>

            <fieldset id="carbon-fields" class="price-fields">
                <legend>Carbon Prices</legend>
                <div class="form-group">
                    <label for="full_carbon">Full Price:</label>
                    <input type="number" step="0.01" name="full_carbon" id="full_carbon" min="0">
                </div>
                <div class="form-group">
                    <label for="front_carbon">Front Price:</label>
                    <input type="number" step="0.01" name="front_carbon" id="front_carbon" min="0">
                </div>
                <div class="form-group">
                    <label for="back_carbon">Back Price:</label>
                    <input type="number" step="0.01" name="back_carbon" id="back_carbon" min="0">
                </div>
            </fieldset>

            <fieldset id="ceramic-fields" class="price-fields">
                <legend>Ceramic Prices</legend>
                <div class="form-group">
                    <label for="full_ceramic">Full Price:</label>
                    <input type="number" step="0.01" name="full_ceramic" id="full_ceramic" min="0">
                </div>
                <div class="form-group">
                    <label for="front_ceramic">Front Price:</label>
                    <input type="number" step="0.01" name="front_ceramic" id="front_ceramic" min="0">
                </div>
                <div class="form-group">
                    <label for="back_ceramic">Back Price:</label>
                    <input type="number" step="0.01" name="back_ceramic" id="back_ceramic" min="0">
                </div>
            </fieldset>

            <div class="form-group">
                <input type="submit" value="Update Pricing">
            </div>
        </form>
        <?php if ($success_message): ?>
            <p class="message success"><?= $success_message ?></p>
        <?php elseif ($error_message): ?>
            <p class="message error"><?= $error_message ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
