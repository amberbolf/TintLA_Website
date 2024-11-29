<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminLogin.php");
    exit();
}
// tintla_database connection
$servername = "localhost";
$username = "root";
$password = "";
$databaseName="tintla_database";

$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $databaseName);

// checks connection
if ($conn->connect_error) {
    die("connection failed". $conn->connect_error);
}

// Initialize variables
$first_name = '';
$last_name = '';
$results = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);

    // Validate inputs
    if (!empty($first_name) && !empty($last_name)) {
        // Query the database for matching quotes
        $stmt = $pdo->prepare("SELECT * FROM quotes WHERE first_name = :first_name AND last_name = :last_name");
        $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $error_message = "Please enter both first and last names.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Quotes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blue;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Quotes</h1>
        <form method="POST" action="">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($first_name) ?>">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($last_name) ?>">

            <input type="submit" value="Search Quotes">
        </form>

        <?php if (!empty($error_message)): ?>
            <p class="error"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>

        <?php if (!empty($results)): ?>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Vehicle Year</th>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>Tint Type</th>
                        <th>Coverage Type</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['first_name']) ?></td>
                            <td><?= htmlspecialchars($row['last_name']) ?></td>
                            <td><?= htmlspecialchars($row['vehicle_year']) ?></td>
                            <td><?= htmlspecialchars($row['vehicle_make']) ?></td>
                            <td><?= htmlspecialchars($row['vehicle_model']) ?></td>
                            <td><?= htmlspecialchars($row['tint_type']) ?></td>
                            <td><?= htmlspecialchars($row['coverage_type']) ?></td>
                            <td>$<?= htmlspecialchars(number_format($row['price'], 2)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($results)): ?>
            <p>No quotes found for the given name.</p>
        <?php endif; ?>
    </div>
</body>
</html>
