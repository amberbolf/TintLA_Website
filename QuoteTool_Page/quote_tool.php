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
        .containertop {
            width: 100%;
            padding-left: 10px;
            background-color: #0F49B8;
            height: 20px;
            padding-top: 10px;
            padding-bottom: 25px;
            line-height: 5px;
            color: white;
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
            margin: 0 15px;
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
           
            padding: 10px;
        }
        .section-center {
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #0F49B8;
            text-align: center;
            margin-bottom: 40px;
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

        /* CSS */
        .button-1 {
        background-color: #0F49B8;
        border-radius: 8px;
        border-style: none;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        font-weight: 500;
        height: 40px;
        line-height: 20px;
        list-style: none;
        margin: 0;
        outline: none;
        padding: 10px 20px;
        position: relative;
        text-align: center;
        text-decoration: none;
        transition: color 100ms;
        vertical-align: center;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        }

        .button-1:hover,
        .button-1:focus {
        background-color: #F082AC;
        }
        .button-wrapper {
    text-align: center; /* Centers the button horizontally */
    margin-top: 20px;   /* Optional: Adds some spacing above the button */
}
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
            text-align: center;
        }

        label {
        text-align: left; 
    }

        input {
        width: 98%; 
    }
        select {
            margin-top: 10px;
            width: 190px;
            height: 30px;
            border-radius: 5px;
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
        
        
            <section class="section-center">
                <h2 style= "color:white">Get A Quick Quote</h2>

                <hr style="width:80%;">

                <br>
                <p style= "color:white">To get a quick quote for Automotive tinting, fill out your <br>
                information below. <br><br><br>
                To get a quote for Commercial or Residential tinting, please visit <br>
                the Contact Us page. <br></p>
            </section>
        <div class ="container2">
            <div class="container1">
            <section class="section-left-boarder">
                <form action="ContactUs.php" method="post">
                    <label for="first name"><b>First Name:</b></label> <br>
                    <input type="text" id="first_name" name="first_name" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>

                    <label id="last_name" for="last name"><b>Last Name:</b></label> <br>
                    <input type="text" id="last_name" name="last_name" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>

                    <label for="email"><b>Email:</b></label> <br>
                    <input type="email" id="email" name="email" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>

                    <label for="phone_num"><b>Phone Number:</b></label> <br>
                    <input type="text" id="phone_num" name="phone_num" style=" margin-top: 10px; border:2px solid #0F49B8;border-radius: 5px; height: 25px;" maxlength="50" size="70" required><br><br>
                    
                    <label for="car_make"><b>Car Make:</b></label><br>

                    <!--for right now this is hardcoded options-->
                    <select style = "border: 2px solid #0F49B8;" name="car_makes" id="car_makes">
                        <option disabled selected value> Select an option </option>
                        <option value="acura">Acura</option>
                        <option value="audi">Audi</option>
                    </select> <br><br>

                    <label for="car_model"><b>Car Model:</b></label> 
                    <br>
                    <!--for right now this is hardcoded options-->
                    <select style = "border: 2px solid #0F49B8;" name="car_models" id="car_models">
                        <option disabled selected value> Select an option </option>
                        <option value="mdx9">MDX (9)</option>
                        <option value="mdx7">MDX (7)</option>
                        <option value="a4">A4</option>
                    </select> <br><br>

                    <label for="car_year"><b>Car Year:</b></label> <br>
                    <!--for right now this is hardcoded options, maybe keep hardcoded???-->
                    <select style = "border: 2px solid #0F49B8;" name="car_years" id="car_years">
                        <option disabled selected value> Select an option </option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                    </select> <br><br>

                    <label for="tint_type"><b>Tint Type:</b></label> <br>
                    <!--for right now this is hardcoded options, maybe keep hardcoded???-->
                    <select style = "border: 2px solid #0F49B8;" name="tint_types" id="tint_types">
                        <option disabled selected value> Select an option </option>
                        <option value="carbon">Carbon</option>
                        <option value="ceramic">Ceramic</option>
                    </select> <br><br>

                    <div class="button-wrapper">
                    <button class="button-1" role="button">Submit</button>
                    </div>

                </form>
            </section>
            </div>
        </div>    

        </div>    
        </main>
        
        <footer>
            <p>&copy; Now serving Los Angeles and all the surrounding suburbs. Give us a call at 626.548.4683 (San Gabriel Valley) or 818.200.6657 (San Fernando Valley or Los Angeles) to schedule your appointment now.
            Same day service, quality work, we tint any make and model of vehicle and only the best quality in film brands with a lifetime warranty.</p>
        </footer>
    </div>    
</body>


</html>