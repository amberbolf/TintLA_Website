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
            background-color: white;
            color: black;
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
            margin: 0 45px;
        }
        nav ul li a {
            color: black;
            font-weight: bold;
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
            border: 5px solid #333;
            text-align: center;
            margin-bottom: 40px;
            background-color: #0F49B8;
            color: white;
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
    <div style="padding-left: 10px; padding-right: 10px; display: flex; justify-content: space-between; background-color: #0F49B8">
    <p style="font-size:small; flex-basis: 49.5%; color: white;">San Fernando Valley 818-200-6657 | San Gabriel Valley 626-548-4683</p>
    <a style="text-decoration: none; padding-top: 12px; font-size:small; flex-basis: 49.5%; color: white; text-align: right;" href="https://www.facebook.com/shoptintla/">Check Out Our Facebook!</a>
    </div>
    <div class="container1">
        <header>
            <div class = "logo">
                <a href="/TintLA_Website/Home_Page/Home.php">
                    <img src="tintla_logo.png" alt="Tintla_logo">
                </a>
            </div>
            <nav>
                <ul>
                <li><a href="/TintLA_Website/Automotive_Page/AutomotiveTinting.php">Automotive Tinting</a></li> 
                <li><a href="/TintLA_Website/Commercial_Page/CommercialTinting.php">Commercial Tinting</a></li> 
                <li><a href="/TintLA_Website/Residential_Page/ResidentialTinting.php">Residential Tinting</a></li> 
                <li><a href="/TintLA_Website/TintworkFilm_Page/TintworkFilm.php">Tintwork Film</a></li> 
                <li><a href="/TintLA_Website/PhotoGallery_Page/TintingPhotoGallery.php">Tinting Photo Gallery</a></li> 
                <li><a href="/TintLA_Website/ContactUs_Page/ContactUs.php">Contact Us</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class ="container1">  
            <section class="section-center-boarder-top">
                <h1>COMMERCIAL TINTING</h1>
                <hr style="width: 80%">
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
        <header style="background-color: #0F49B8; color: white;">
            <div class = "logo">
                <a href="/TintLA_Website/Home_Page/Home.php">
                    <img src="tintla_logo.png" alt="Tintla_logo">
                </a>
            </div>
            <nav>
                <ul>
                <li><a style="color:white;"href="/TintLA_Website/Automotive_Page/AutomotiveTinting.php">Automotive Tinting</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/Commercial_Page/CommercialTinting.php">Commercial Tinting</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/Residential_Page/ResidentialTinting.php">Residential Tinting</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/TintworkFilm_Page/TintworkFilm.php">Tintwork Film</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/PhotoGallery_Page/TintingPhotoGallery.php">Tinting Photo Gallery</a></li> 
                <li><a style="color:white;"href="/TintLA_Website/ContactUs_Page/ContactUs.php">Contact Us</a></li>
                </ul>
            </nav>
        </header>

        <footer>
            <p style="padding: 10px;">&copy; Now serving Los Angeles and all the surrounding suburbs. Give us a call at 626.548.4683 (San Gabriel Valley) or 818.200.6657 (San Fernando Valley or Los Angeles) to schedule your appointment now.
            Same day service, quality work, we tint any make and model of vehicle and only the best quality in film brands with a lifetime warranty.</p>
        </footer>
    </div>    

    

</body>
</html>
