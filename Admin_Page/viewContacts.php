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
$search_term = '';
$contacts = [];

// Check if a search is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_term = trim($_POST['search_term']);

    // Determine if the search term is a name or phone number
    if (!empty($search_term)) {
        if (is_numeric($search_term)) {
            // Search by phone number
            $stmt = $pdo->prepare("SELECT * FROM contacts WHERE phone_number LIKE :search_term ORDER BY id DESC LIMIT 20");
            $stmt->execute(['search_term' => '%' . $search_term . '%']);
        } else {
            // Search by name (first or last)
            $stmt = $pdo->prepare("SELECT * FROM contacts WHERE first_name LIKE :search_term OR last_name LIKE :search_term ORDER BY id DESC LIMIT 20");
            $stmt->execute(['search_term' => '%' . $search_term . '%']);
        }
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    // Fetch the top 20 recent contacts
    $stmt = $pdo->query("SELECT * FROM contacts ORDER BY id DESC LIMIT 20");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>View Contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blue;
            margin: 20px;
        }
        .container {
            max-width: 800px;
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
            display: flex;
            justify-content: center;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin-right: 10px;
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
        .no-results {
            text-align: center;
            color: #999;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Recent Contacts</h1>

        <!-- Search Form -->
        <form method="POST" action="">
            <input type="text" name="search_term" placeholder="Search by name or phone number" value="<?= htmlspecialchars($search_term) ?>">
            <input type="submit" value="Search">
        </form>

        <?php if (!empty($contacts)): ?>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?= htmlspecialchars($contact['first_name']) ?></td>
                            <td><?= htmlspecialchars($contact['last_name']) ?></td>
                            <td><?= htmlspecialchars($contact['phone_number']) ?></td>
                            <td><?= htmlspecialchars($contact['email']) ?></td>
                            <td><?= htmlspecialchars($contact['message']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-results">No contacts found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
