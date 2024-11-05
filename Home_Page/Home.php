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
        .button:hover{background-color: 3e8341}
        .button:active{
            background-color: #3e8341;
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
                >Facebook Link<
                </ul>
            </nav>
        </header>
        
        <div class ="container2">
            <section class="section-center">
                <h2><img src="tintla_logo.png" alt="Tintla_logo"></h2>
                
                <p>TINT LA’s 30+ years of quality service gives us savvy know how and <br>
                understanding of all automotive, residential and commercial film requirements. <br>
                Our exclusively made Tintwork window film and other well-known brands are <br>
                in stock. All are tested to ensure the ultimate in protection from sun fading, <br> 
                deterioration of interiors, sun glare reduction, heat rejection and privacy.</p>

                
            <a href="/TintLA_Website/ContactUs_Page/ContactUs.php" class="button"> Get A Quote </a>
            </section>

            <section class="section-center">
                <h2><img src="tint_shades2.jpg" alt="Tint_shades"></h2>
            </section>
        </div>    
        <div class ="container3">
            <section class="section-center-boarder">
                <h2>INSTALLATION PROCESS</h2>
                <p>We come to you! Our mobile installers will come to you rlocation and use your garage to tint your vehicle.</p>
                <p>Enjoy the benefits of mobile installation, including saving time and effort, no need to wait in a shop, and installation done in a clean and protected environment.</p>
                <p>Experience a high-quality window tint installation in the comfort of your own home.</p>
            </section>
            
            <section class="section-center-boarder">
                <h2>INSTALLERS</h2>
                <p>They will use high-quality materials and techniques to ensure a professional finish.</p>
                <p>They are responsible for ensuring a high-quality installation that meets our standards.</p>
                <p>Our network of installers is carefully selected for their expertise and experience.</p>
            </section>
            
            <section class="section-center-boarder">
                <h2>WARRANTY</h2>
                <p>Our installers provide a lifetime warranty on their work.</p>
                <p>Tint LA offers customer support and assistance as needed.</p>
                <p>We stand behind the quality of our installations and will work with you to resolve any issues that may arise.</p>
            </section>
        </div>    
        </main>
        
        <footer>
            <p>&copy; Now serving Los Angeles and all the surrounding suburbs. Give us a call at 626.548.4683 (San Gabriel Valley) or 818.200.6657 (San Fernando Valley or Los Angeles) to schedule your appointment now.
            Same day service, quality work, we tint any make and model of vehicle and only the best quality in film brands with a lifetime warranty.</p>
        </footer>
    </div>    
</body>


</html>
