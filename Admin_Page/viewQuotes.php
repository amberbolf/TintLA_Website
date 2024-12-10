<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminLogin.php");
    exit();
}

// Database configuration
$host = 'localhost'; 
$dbname = 'tintla_database'; 
$username = 'root'; 
$password = ''; 

// Establish database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Initialize variables
$search_term = '';
$results = [];
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 20;
$offset = ($current_page - 1) * $records_per_page;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_term = trim($_POST['search']);

    // Query based on search term
    $query = "SELECT * FROM customers ";
    if (!empty($search_term)) {
        $query .= "WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search OR phone_num LIKE :search ";
    }
    $query .= "LIMIT :limit OFFSET :offset";

    $stmt = $pdo->prepare($query);
    if (!empty($search_term)) {
        $stmt->bindValue(':search', "%$search_term%", PDO::PARAM_STR);
    }
    $stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Default query to display all quotes
    $stmt = $pdo->prepare("SELECT * FROM customers LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Calculate total number of records for pagination
$total_records_query = "SELECT COUNT(*) FROM customers";
if (!empty($search_term)) {
    $total_records_query .= " WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search OR phone_num LIKE :search";
}
$total_stmt = $pdo->prepare($total_records_query);
if (!empty($search_term)) {
    $total_stmt->bindValue(':search', "%$search_term%", PDO::PARAM_STR);
}
$total_stmt->execute();
$total_records = $total_stmt->fetchColumn();
$total_pages = ceil($total_records / $records_per_page);
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
            margin: 0;
            padding: 0;
        }
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .container {
            max-width: 100%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden; /* Ensures no content spills out */
            box-sizing: border-box; /* Ensure padding doesn't overflow */
            min-width: 800px; /* Minimum width to prevent the table from being squeezed */
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; /* Prevents table from expanding beyond container */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            overflow: hidden; /* Prevents overflow within cells */
            text-overflow: ellipsis; /* Adds ellipsis if the content overflows */
        }
        th {
            background-color: #f4f4f4;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            color: #007BFF;
        }
        .pagination a.active {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
<a href="admin.php" class="back-button">&larr; Back to Admin</a>
<div class="container">
    <h1>View Quotes</h1>
    <form method="POST" action="">
        <input type="text" name="search" placeholder="Search by name, email, or phone" value="<?= htmlspecialchars($search_term) ?>">
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($results)): ?>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
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
                        <td><?= htmlspecialchars($row['phone_num']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
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

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= $i === $current_page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    <?php else: ?>
        <p>No quotes found.</p>
    <?php endif; ?>
</div>
</body>
</html>
