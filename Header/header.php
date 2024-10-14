<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tint LA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tint LA</h1>
        <nav>
            <ul>
                <li><a href="automotive.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'automotive.php' ? 'active' : ''; ?>">Automotive Tinting</a></li>
                <li><a href="commercial.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'commercial.php' ? 'active' : ''; ?>">Commercial Tinting</a></li>
                <li><a href="residential.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'residential.php' ? 'active' : ''; ?>">Residential Tinting</a></li>
                <li><a href="home.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'home.php' ? 'active' : ''; ?>"><img src="tintLAlogo.png"  /></a></li>
                <li><a href="film.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'film.php' ? 'active' : ''; ?>">Tintwork Film</a></li>
                <li><a href="photo.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'photo.php' ? 'active' : ''; ?>">Tinting Photo Gallery</a></li>
                <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact Us</a></li>
            </ul>
        </nav>
    </header>
