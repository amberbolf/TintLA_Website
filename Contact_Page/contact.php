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
            background-color: #333;
            color: white;
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
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
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
            text-align: center;
            margin-bottom: 40px;
            border: 5px solid #ddd; 
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
        footer{
            background-color: #333;
            color: white;
            padding: 10px 0;
            align-items: center;                  
            display: flex;       
        }
    </style>

</head>

<body>
    <div class="container1">
    <header>
        <div class = "logo">
            <a href="Home.php">
                <img src="tintla_logo.png" alt="TINTLA">
            </a>
        </div>
            <nav>
                <ul>
                    <li><a href="AutomotiveTinting.php">Automototive Tinting</a></li>
                    <li><a href="CommercialTinting.php">Commercial Tinting</a></li>
                    <li><a href="ResidentialTinting.php">Residential Tinting</a></li>
                    <li><a href="TintworkFilm.php">Tintwork Film</a></li>
                    <li><a href="TintingPhotoGallery.php">Tinting Photo Gallery</a></li>
                    <li><a href="ContactUs.php">Contact Us</a></li>
                    >Facebook Links<
                </ul>
            </nav>
    </header>
    </div>

    <div class = "container1">  
            <section class="section-center-boarder-top">
                <h1>CONTACT US</h1>
            </section>
    </div>

    <div class="container1">
        <section class="section-left-boarder">
            <action="ContactUs_Output.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>

                <label for="phone">Phone Number:</label>
                <input type="phone" id="phone" name="phone"><br><br>

                <label for="city">City:</label>
                <input type="city" id="city" name="city"><br><br>

                <label for="contact">Prefered Contact:</label>
                <input type="contact" id="contact" name="contact"><br><br>

                <label for="make">Car Make:</label>
                <input type="make" id="make" name="make"><br><br>

                <label for="model">Car Model:</label>
                <input type="model" id="model" name="model"><br><br>

                <label for="Year">Car Year:</label>
                <input type="Year" id="Year" name="Year"><br><br>

                

                <a href="ContactUs_Output.php" class="button"> Submit </a>


            </action>
        </section>
    </div>
</body>


<div class="container1">
    <footer>
        <div class = "logo">
            <a href="Home.php">
                <img src="tintla_logo.png" alt="TINTLA">
            </a>
        </div>
            <nav>
                <ul>
                    <li><a href="AutomotiveTinting.php">Automototive Tinting</a></li>
                    <li><a href="CommercialTinting.php">Commercial Tinting</a></li>
                    <li><a href="ResidentialTinting.php">Residential Tinting</a></li>
                    <li><a href="TintworkFilm.php">Tintwork Film</a></li>
                    <li><a href="TintingPhotoGallery.php">Tinting Photo Gallery</a></li>
                    <li><a href="ContactUs.php">Contact Us</a></li>
                    >Facebook Link<
                </ul>
            </nav>
    </footer>
</div>