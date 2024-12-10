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
$search_term = '';
$contacts = [];
$per_page = 20; // Number of results per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $per_page; // Offset for SQL query

// Check if a search is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_term = trim($_POST['search_term']);

    // Determine if the search term is a name or phone number
    if (!empty($search_term)) {
        if (is_numeric($search_term)) {
            // Search by phone number
            $stmt = $pdo->prepare("SELECT * FROM inquiries WHERE phone_num LIKE :search_term ORDER BY inquiry_id DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':search_term', '%' . $search_term . '%', PDO::PARAM_STR);
        } else {
            // Search by name (first or last)
            $stmt = $pdo->prepare("SELECT * FROM inquiries WHERE first_name LIKE :search_term OR last_name LIKE :search_term ORDER BY inquiry_id DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':search_term', '%' . $search_term . '%', PDO::PARAM_STR);
        }
        $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    // Fetch the top 20 recent contacts
    $stmt = $pdo->prepare("SELECT * FROM inquiries ORDER BY inquiry_id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get total number of inquiries for pagination
$stmt = $pdo->query("SELECT COUNT(*) FROM inquiries");
$total_inquiries = $stmt->fetchColumn();
$total_pages = ceil($total_inquiries / $per_page); // Total pages required
?>

<!DOCTYPE html>
<html lang="en">
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
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            padding: 10px;
            margin: 0 5px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .pagination a:hover {
            background-color: #0056b3;
        }
        .pagination span {
            padding: 10px;
            margin: 0 5px;
            color: #007BFF;
        }
    </style>
</head>
<body>
<a href="admin.php" class="back-button">← Back to Admin</a>
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
                        <th>Date Submitted</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?= htmlspecialchars($contact['first_name']) ?></td>
                            <td><?= htmlspecialchars($contact['last_name']) ?></td>
                            <td><?= htmlspecialchars($contact['phone_num']) ?></td>
                            <td><?= htmlspecialchars($contact['email']) ?></td>
                            <td><?= htmlspecialchars($contact['date_submitted']) ?></td>
                            <td><?= htmlspecialchars($contact['inquiry_message']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-results">No contacts found.</p>
        <?php endif; ?>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>">Previous</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <span>
                    <a href="?page=<?= $i ?>" <?= $i === $page ? 'style="background-color: #0056b3;"' : '' ?>><?= $i ?></a>
                </span>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?= $page + 1 ?>">Next</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
