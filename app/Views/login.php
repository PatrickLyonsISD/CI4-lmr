<?php
$site_url = base_url();
$local_style = $site_url . "/assets/";
$image_url = $site_url . "/assets/images/";
$script_url = $site_url . "/assets/scripts/";
?>
<html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" 
                  integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <body>
     <div class="form-modal">

    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">Log In</button>
        <button id="signup-toggle" onclick="toggleSignup()">Sign Up</button>
    </div>

    <div id="login-form">
        <form>
            <input type="text" placeholder="Enter K-Number"/>
            <input type="password" placeholder="Enter password"/>
            <button type="button" class="btn login">Login</button>
<!--            <p><a href="javascript:void(0)">Forgot Password</a></p>-->
            <hr/>
            
        </form>
    </div>

    <div id="signup-form">
     <form method="post" action="<?php echo base_url("/Home/userValidation")?>">
            
            <input type="email" placeholder="enter email" value="<?php echo set_value('email'); ?>"/>
            <?php
            if (isset($validation)) {
                echo $validation->getError('email');
            }
            ?><br/>
            
            
            <input type="text" placeholder="enter K-Number" value="<?php echo set_value('knumber'); ?>"/>
            <?php
            if (isset($validation)) {
                echo $validation->getError('knumber');
            }
            ?><br/>
            
            
            <input type="password" placeholder="Create password" value="<?php echo set_value('password'); ?>"/>
            <?php
            if (isset($validation)) {
                echo $validation->getError('password');
            }
            ?><br/>
            
            <input type="text" placeholder="Enter your telephone Number" value="<?php echo set_value('number'); ?>"/>
            <?php
            if (isset($validation)) {
                echo $validation->getError('number');
            }
            ?><br/>
            
            <input type="text" placeholder="Enter your first name" value="<?php echo set_value('fname'); ?>"/>
            <?php
            if (isset($validation)) {
                echo $validation->getError('fname');
            }
            ?><br/>
            
            <input type="text" placeholder="Enter your last name" value="<?php echo set_value('lname'); ?>"/>
            <?php
            if (isset($validation)) {
                echo $validation->getError('lname');
            }
            ?><br/>
            <button type="button" class="btn signup">create account</button>
          
            <hr/>
            
        </form>
    </div>

</div>
<style>
    .form-modal{
        position:relative;
        width:450px;
        height:auto;
        margin-top:4em;
        left:50%;
        transform:translateX(-50%);
        background:#fff;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        border-bottom-right-radius: 20px;
        box-shadow:0 3px 20px 0px rgba(0, 0, 0, 0.1);
        padding: 100px;
        
    }

    .form-modal button{
        cursor: pointer;
        position: relative;
        text-transform: capitalize;
        font-size:1em;
        z-index: 2;
        outline: none;
        background:#fff;
        transition:0.2s;
    }

    .form-modal .btn{
        border-radius: 20px;
        border:none;
        font-weight: bold;
        font-size:1.2em;
        padding:0.8em 1em 0.8em 1em!important;
        transition:0.5s;
        border:1px solid #ebebeb;
        margin-bottom:0.5em;
        margin-top:0.5em;
    }

    .form-modal .login , .form-modal .signup{
        background:#a39461;
        color:#fff;
    }

    .form-modal .login:hover , .form-modal .signup:hover{
        background:#222;
    }

    .form-toggle{
        position: relative;
        width:100%;
        height:auto;
    }

    .form-toggle button{
        width:50%;
        float:left;
        padding:1.5em;
        margin-bottom:1.5em;
        border:none;
        transition: 0.2s;
        font-size:1.1em;
        font-weight: bold;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
    }

    .form-toggle button:nth-child(1){
        border-bottom-right-radius: 20px;
    }

    .form-toggle button:nth-child(2){
        border-bottom-left-radius: 20px;
    }

    #login-toggle{
        background:#a39461;
        color:#ffff;
    }

    .form-modal form{
        position: relative;
        width:90%;
        height:auto;
        left:50%;
        transform:translateX(-50%);  
    }

    #login-form , #signup-form{
        position:relative;
        width:100%;
        height:auto;
        padding-bottom:1em;
    }

    #signup-form{
        display: none;
    }


    #login-form button , #signup-form button{
        width:100%;
        margin-top:0.5em;
        padding:0.6em;
    }

    .form-modal input{
        position: relative;
        width:100%;
        font-size:1em;
        padding:1.2em 1.7em 1.2em 1.7em;
        margin-top:0.6em;
        margin-bottom:0.6em;
        border-radius: 20px;
        border:none;
        background:#ebebeb;
        outline:none;
        font-weight: bold;
        transition:0.4s;
    }

    .form-modal input:focus , .form-modal input:active{
        transform:scaleX(1.02);
    }

    .form-modal input::-webkit-input-placeholder{
        color:#222;
    }


    .form-modal p{
        font-size:16px;
        font-weight: bold;
    }

    .form-modal p a{
        color:#a39461;
        text-decoration: none;
        transition:0.2s;
    }

    .form-modal p a:hover{
        color:#222;
    }


    .form-modal i {
        position: absolute;
        left:10%;
        top:50%;
        transform:translateX(-10%) translateY(-50%); 
    }

    .fa-google{
        color:#dd4b39;
    }

    .fa-linkedin{
        color:#3b5998;
    }

    .fa-windows{
        color:#0072c6;
    }

    .-box-sd-effect:hover{
        box-shadow: 0 4px 8px hsla(210,2%,84%,.2);
    }

    @media only screen and (max-width:500px){
        .form-modal{
            width:100%;
        }
    }

    @media only screen and (max-width:400px){
        i{
            display: none!important;
        }
    }
</style>
<script>
    function toggleSignup() {
        document.getElementById("login-toggle").style.backgroundColor = "#fff";
        document.getElementById("login-toggle").style.color = "#222";
        document.getElementById("signup-toggle").style.backgroundColor = "#a39461";
        document.getElementById("signup-toggle").style.color = "#fff";
        document.getElementById("login-form").style.display = "none";
        document.getElementById("signup-form").style.display = "block";
    }

    function toggleLogin() {
        document.getElementById("login-toggle").style.backgroundColor = "#a39461";
        document.getElementById("login-toggle").style.color = "#fff";
        document.getElementById("signup-toggle").style.backgroundColor = "#fff";
        document.getElementById("signup-toggle").style.color = "#222";
        document.getElementById("signup-form").style.display = "none";
        document.getElementById("login-form").style.display = "block";
    }
</script>
   