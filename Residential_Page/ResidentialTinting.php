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
            width: 30%;
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
                <a href="/Home_Page/Home.php">
                    <img src="tintla_logo.png" alt="Tintla_logo">
                </a>
            </div>
            <nav>
                <ul>
                <li><a href="/Automotive_Page/AutomotiveTinting.php">Automotive Tinting</a></li> 
                <li><a href="/Commercial_Page/CommercialTinting.php">Commercial Tinting</a></li> 
                <li><a href="/Residential_Page/ResidentialTinting.php">Residential Tinting</a></li> 
                <li><a href="/TintworkFilm_Page/TintworkFilm.php">Tintwork Film</a></li> 
                <li><a href="/PhotoGallery_Page/TintingPhotoGallery.php">Tinting Photo Gallery</a></li> 
                <li><a href="/ContactUs_Page/ContactUs.php">Contact Us</a></li>
                >Facebook Link<
                </ul>
            </nav>
        </header>
    </div>

    <div class ="container1">  
            <section class="section-center-boarder-top">
                <h1>RESIDENTIAL TINTING</h1>
            </section>
    </div>

    <div class ="container4">
        <section class="section-center-boarder">                
            <p>Preserve Your Interior</p>     
            <p>Add Extra Safety</p> 
            <p>Cut Utility Bills</p> 
            <p>Add Value and Style</p> 
            <p>Add Comfort</p>
        </section>
    </div>

    <div class="container2">
        <section class="section-center">
            <img src="Res_View1.png" alt="RESIDENTAIL_VIEW1">
        </section>
    </div>

    <div class="container2">
        <section class="section-center">
            <img src="Res_View2.png" alt="RESIDENTAIL_VIEW2">
        </section>
    </div>

    <div class ="container3">
        <section class="section-center">                
            <h2><p>Residential Window Tinting</p></h2>  
            <p>Open Your Home to Safe Light</p> 
            <p>Clarity. Protection. Efficiency.</p>
            <img src="Res_View3_resized.png" alt="RESIDENTAIL_VIEW3">
        </section>
    </div>

    <div class ="container3">
        <section class="section-center-boarder">                
            <p>Enjoy the ultimate comfort in your home with window tint. Available in a spectrum of shades to reduce glare, block UV rays, and control heat. Decorative films add privacy while enhancing the modern style of your home.</p>
            <p>Window film also provides security and safety. Our films will assist in safeguarding your home from intruders and natural disasters such as earthquakes and harsh weather while hosting energy efficiency: Cooler in summer and warmer in winter. Our high heat rejection films reduce air conditioning costs resulting in lower utility bills.</p>
            <p>Add Outlook Window Tinting Services is our sister company that specializes in Commercial and Residential window tinting. Please visit their website directly for more information and choices of window films for your home.</p>
        </section>
    </div>
</body>