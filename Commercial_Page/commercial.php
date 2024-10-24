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
        .container4 {
            width: 40%;
            margin: 0 auto;
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
            text-align: center;         
            bottom: 0;
            width: 100%;
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
                    >Facebook Link<
                </ul>
            </nav>
    </header>
    </div>

    <div class ="container1">  
            <section class="section-center-boarder-top">
                <h1>COMMERCIAL TINTING</h1>
            </section>
    </div>   


    <div class="container2">
        <section class="section-center">
            <div style="display: inline-block; text-align: center; margin-right: 150px;">
                <h2>INSIDE VIEW</h2>
                <img src="commercial_insideview.png" alt="INSIDE_VIEW">
                <div>Only 5% Light Allowed Through</div>
            </div>

            <div style="display: inline-block; text-align: center; margin-right: 20px;">
                <h2>OUTSIDE VIEW</h2>
                <img src="commercial_outsideview.png" alt="OUTSIDE_VIEW">
                <div>Completely Reflective</div>
            </div>
        </section>
    </div>

    <div class ="container3">
        <section class="section-center-boarder">                
            <p>Window films help protect your office or retail location from theft, vandals, sun damage and natural disasters while offering comfort to your customers and staff alike.
                Add Outlook Window Tinting Services is our sister company that specializes in Commercial and Residential window tinting. Please visit their website directly for more information and choices of window films for your commercial building.
            </p>
        </section>
    </div>


    <div class="container1">
        <footer>
                <nav>
                    <ul>
                        <li><a href="Home.php"><img src="tintla_logo.png" alt="TINTLA"></a></li>
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

    

</body>
</html>
