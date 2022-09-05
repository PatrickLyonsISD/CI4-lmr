<?php
$site_url = base_url();
$local_style = $site_url . "/assets/";
$image_url = $site_url . "/assets/images/";
$css_url = $site_url . "/assets/stylesheets/";
$script_url = $site_url . "/assets/scripts/";
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="nav.css"/>

    </head>
    <body>
        <nav>
            <div class="logo">
                <li> <?php echo anchor('Home/index', img($image_url . "tuslogo.png")); ?></li>
            </div>
            <div class="hamburger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <!-- <ul class="nav-links">
                <li><?php echo anchor('Home/index', 'Home'); ?></li>
                <li><?php echo anchor('Home/addBooking', 'Book a room'); ?></li>
                <li><?php echo anchor('Home/profile','profile');?></li>
                <li><a href="#">Email</a></li>
                <li><a href="#">Services(room List)</a></li> -->




                <ul class="nav-links">
                    <li> <?php echo anchor('Home/index',img($image_url . "logo.png")); ?></li>
                    <li><?php echo anchor('Home/Portal', 'booking Management'); ?></li>
                    <li><?php echo anchor('Home/addBookingPage', 'Book a room'); ?></li>
</li>
                    <li class="navlinks"><?php echo anchor('Home/calendar', 'calendar'); ?></li>
                    <?php if(isset($_SESSION['Name'])){
                        echo "<li class=\"navlinks\">". anchor('Home/Profile', 'profile')."</li>";?>
                      
                  <?php  }?>
                  

        
                    <?php if(!isset($_SESSION['Name'])){
                            echo  "<li class=\"navlinks login\">".anchor('Home/loginForm', 'Login/regisetr')."</li>";
                    }
                    else{
                        echo  "<li class=\"navlinks login\">".anchor('Home/Logout', 'Logout')."</li>";
                    }?>



               
                </ul>   

            
        </nav>
        <script src="nav.js"></script>
    </body>
</html>
<style>

    nav{
        height: 6rem;
        width: 100vw;
        background-color: white;
        display: flex;
        position: relative;
        z-index: 10;
        top: 1px;
        
    }

    /*Styling logo*/
    .logo{
        padding:1vh 1vw;
        text-align: center;
        list-style: none;
    }
    .logo img {
        height: 5rem;
        width: 10rem;
    }

    /*Styling Links*/
    .nav-links{
        display: flex;
        list-style: none; 
        width: 88vw;
        padding: 0 0.7vw;
        justify-content: space-evenly;
        align-items: center;
        text-transform: uppercase;

    }
    .nav-links li a{
        text-decoration: none;
        margin: 0 0.7vw;
        color: black;
    }
    .nav-links li a:hover {
        color: #a39461;
    }
    .nav-links li {
        position: relative;
    }
    .nav-links li a::before {
        content: "";
        display: block;
        height: 3px;
        width: 0%;
        background-color: #a39461;
        position: absolute;
        transition: all ease-in-out 250ms;
        margin: 0 0 0 10%;
    }
    .nav-links li a:hover::before{
        width: 80%;
    }

    /*Styling Buttons*/
    .login-button{
        background-color: transparent;
        border: 1.5px solid #f2f5f7;
        border-radius: 2em;
        padding: 0.6rem 0.8rem;
        margin-left: 2vw;
        font-size: 1rem;
        cursor: pointer;

    }
    .login-button:hover {
        color: #131418;
        background-color: #a39461;
        border:1.5px solid #f2f5f7;
        transition: all ease-in-out 350ms;
    }
    .join-button{
        color: #131418;
        background-color: #a39461;
        border: 1.5px solid #a39461;
        border-radius: 2em;
        padding: 0.6rem 0.8rem;
        font-size: 1rem;
        cursor: pointer;
    }
    .join-button:hover {
        color: #f2f5f7;
        background-color: #a39461;
        border:1.5px solid #f2f5f7;
        transition: all ease-in-out 350ms;
    }

    /*Styling Hamburger Icon*/
    .hamburger div{
        width: 30px;
        height:3px;
        background: #131418;
        margin: 5px;
        transition: all 0.3s ease;
    }
    .hamburger{
        display: none;
    }

    /*Stying for small screens*/
    @media screen and (max-width: 800px){
        nav{
            position: fixed;
            z-index: 3;
        }
        .hamburger{
            display:block;
            position: absolute;
            cursor: pointer;
            right: 5%;
            top: 50%;
            transform: translate(-5%, -50%);
            z-index: 2;
            transition: all 0.7s ease;
        }
        .nav-links{
            position: fixed;
            background: #131418;
            height: 100vh;
            width: 100%;
            flex-direction: column;
            clip-path: circle(50px at 90% -20%);
            -webkit-clip-path: circle(50px at 90% -10%);
            transition: all 1s ease-out;
            pointer-events: none;
        }
        .nav-links.open{
            clip-path: circle(1000px at 90% -10%);
            -webkit-clip-path: circle(1000px at 90% -10%);
            pointer-events: all;
        }
        .nav-links li{
            opacity: 0;
        }
        .nav-links li:nth-child(1){
            transition: all 0.5s ease 0.2s;
        }
        .nav-links li:nth-child(2){
            transition: all 0.5s ease 0.4s;
        }
        .nav-links li:nth-child(3){
            transition: all 0.5s ease 0.6s;
        }
        .nav-links li:nth-child(4){
            transition: all 0.5s ease 0.7s;
        }
        .nav-links li:nth-child(5){
            transition: all 0.5s ease 0.8s;
        }
        .nav-links li:nth-child(6){
            transition: all 0.5s ease 0.9s;
            margin: 0;
        }
        .nav-links li:nth-child(7){
            transition: all 0.5s ease 1s;
            margin: 0;
        }
        li.fade{
            opacity: 1;
        }
    }
    /*Animating Hamburger Icon on Click*/
    .toggle .line1{
        transform: rotate(-45deg) translate(-5px,6px);
    }
    .toggle .line2{
        transition: all 0.7s ease;
        width:0;
    }
    .toggle .line3{
        transform: rotate(45deg) translate(-5px,-6px);
    }
</style>