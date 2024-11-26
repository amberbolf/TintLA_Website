<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: adminLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TintLA Admin</title>
    <style>
        body {
            background-color: blue; /* Blue background */
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: darkblue;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        header h1 {
            margin: 0;
        }
        .logout-button {
            background: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .logout-button:hover {
            background: darkred;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 60px); /* Subtract header height */
            text-align: center;
        }
        .button {
            background: white;
            color: blue;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin: 10px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .button:hover {
            background: lightgray;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Portal</h1>
        <form action="adminLogout.php" method="POST" style="margin: 0;">
            <button class="logout-button" type="submit">Logout</button>
        </form>
    </header>

    <div class="container">
        <h2>TintLA Admin Portal</h2>
        <p>Select an action below:</p>
        <button class="button" onclick="location.href='editPricing.php';">Edit Pricing</button>
        <button class="button" onclick="location.href='viewQuotes.php';">View Quotes</button>
    </div>
</body>
</html>
