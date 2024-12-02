<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminLogin.php");
    exit();
}
// Database configuration
$host = 'localhost'; // Database host
$dbname = 'tintla_database'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

// Establish database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
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
        $stmt = $pdo->prepare("SELECT * FROM customers WHERE first_name = :first_name AND last_name = :last_name");
        $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $error_message = "Please enter both first and last names.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<header>
        <form action="admin.php" method="POST" style="margin: 0;">
            <button class="home-button" type="submit">Back</button>
        </form>
    </header>
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
            padding: 80px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
<a href="admin.php" class="back-button">← Back to Admin</a>
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
                            <td><?= htmlspecialchars($row['car_year']) ?></td>
                            <td><?= htmlspecialchars($row['car_make']) ?></td>
                            <td><?= htmlspecialchars($row['car_model']) ?></td>
                            <td><?= htmlspecialchars($row['tint_type']) ?></td>
                            <td><?= htmlspecialchars($row['tint_coverage']) ?></td>
                            <td>$<?= htmlspecialchars(number_format($row['quoted_price'], 2)) ?></td>
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
