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
            width: 100%;
            margin: 0 auto;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #0F49B8;
            text-align: center;
        }
        .container3 {
            width: 60%;
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
            width: 80%;
            text-align: left;
            margin-left: 160px;
        }
        .section-center-textandbutton {
            margin-top: -10px;
            display: flex;
            margin-bottom: 40px;
            font-size: 18px;
        }
        .section-center-boarder {
            text-align: center;
            margin-bottom: 80px;
            border: 5px solid #0F49B8; 
            padding: 10px;
        }
        .section-right {
            text-align: right;
        }
        /**/

        .button {
            padding: 10px 20px;
            cursor: pointer;
            vertical-align: center;
            text-decoration: none;
            outline: none;
            font-weight: bold;
            color: #0F49B8;
            background-color: white;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px #999;
            align-items: center;
            display: inline-flex;
        }
        .button:hover{
            background-color: #999;
        }
        .button:active{
            background-color: #999;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        footer{
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
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
        
        <div class ="container2">
        <h2 style= "color:white; text_align: center;">WHY WINDOW FILM IS GREAT FOR ALL OF YOUR AUTOMOTIVE,<br>
        COMMERCIAL, OR RESIDENTIAL NEEDS</h2>
        <hr style="width:80%;">

            <section class="section-center">

                <h2><img src="tintla_logo.png" alt="Tintla_logo"></h2>

                <section class="section-center-textandbutton">
                    <p style=" text-align: left; color: white;">TINT LA’s 30+ years of quality service gives us savvy <br>know how and
                    understanding of all automotive, residential<br> and commercial film requirements. 
                    Our exclusively made <br>Tintwork window film and other well-known brands are <br>
                    in stock. All are tested to ensure the ultimate in protection<br> from sun fading,
                    deterioration of interiors, sun glare reduction, <br> heat rejection and privacy.</p>

                    <a style="margin-left: 350px; height: 40px; margin-top: 20px;" href="/TintLA_Website/QuoteTool_Page/quote_tool.php" class="button"> Get A Quick Quote </a>
                    <a style="font-weight: bold; margin-left: -175px; margin-top: 130px; text-decoration: none; color: white;" href="#container3" class="btn">Learn More</a>
                    <a id="learn_more" style="margin-left:10px; margin-top:122px; " href="#container3">
                        <img src="arrow_icon.png" style= "width: 30px; height: 30px;"/>
                    </a>
                </section>
            </section>

        </div>  
        
        <h2 style="text-align: center;"><img src="tint_shades2.jpg" alt="Tint_shades"></h2>

        <div class ="container3" id="container3">
        <br>
            <section class="section-center-boarder">
                <h2>INSTALLATION PROCESS</h2>
                <hr style="width:80%;">
                <p>We come to you! Our mobile installers will come to your location and use your garage to tint your vehicle.</p>
                <p>Enjoy the benefits of mobile installation, including saving time and effort, no need to wait in a shop, and installation done in a clean and protected environment.</p>
                <p>Experience a high-quality window tint installation in the comfort of your own home.</p>
            </section>
            
            <section class="section-center-boarder">
                <h2>INSTALLERS</h2>
                <hr style="width:80%;">
                <p>They will use high-quality materials and techniques to ensure a professional finish.</p>
                <p>They are responsible for ensuring a high-quality installation that meets our standards.</p>
                <p>Our network of installers is carefully selected for their expertise and experience.</p>
            </section>
            
            <section class="section-center-boarder">
                <h2>WARRANTY</h2>
                <hr style="width:80%;">
                <p>Our installers provide a lifetime warranty on their work.</p>
                <p>Tint LA offers customer support and assistance as needed.</p>
                <p>We stand behind the quality of our installations and will work with you to resolve any issues that may arise.</p>
            </section>
        </div>    
        </main>
        
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
