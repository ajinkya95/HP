<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
if(isset($_SESSION['logged_in']))
{
    header( "refresh:0; url=home.php" );

}
?>
<html>
    <head>
        	<!-- General meta information -->
                <title>Login</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="./js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	
	
        
        <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <meta charset=utf-8 />
        <link rel="stylesheet" href="css/style1.css"/>
        <link rel="stylesheet" href="css/button.css"/>
        <link rel="stylesheet" href="css/login.css"/>
      

<!-- Include JS File Here -->
<script type="text/javascript" src="js/Validation.js"></script>
        <script>
            
             function validateLoginForm()
	{
            
	var name = document.msform.username.value;
        var password = document.msform.password.value;
        //alert("Username "+name+"\nPassword : "+password);
	//var password = document.getElementById("password").value;
        
	if ( name === "" ){
	alert ("Enter Name");
	return false;
        }
        else if(password==="")
        {
            alert ("Enter Password");
            return false;
            
        }
      

}
</script>
<!--  script src="hover.js"></script  -->
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body >
        <div id="header" style="width:100%; float:left; height:130px; background: #DCF0F7; margin:10px; padding:5px;">
            <img src="Images/logo.png" style="height:90%; width:20%;"/>
        </div>
        
        <div id="left" style="width: 53%; float:left;  margin:10px; background:skyblue; padding:5px;">
            <!--<img src="Images/Ice Baby.jpg" height="400" width="400">-->
        </div>
        
        <div id="right" style="width: 33%; float:left;  margin:10px; padding:5px;">
        
            <form id="msform" method="post" name="login_form" onsubmit="return validateLoginForm()" action="loginValidate.php">
            <fieldset>
		<h2 class="fs-title">Welcome to Halfpace!</h2>
                <h2 class="fs-subtitle">Let's begin</h2>
		<input type="text" id="username" name="username" placeholder="Email" onclick="this.value = ''" />
		<input type="password"  id="password" name="password" placeholder="Password" onclick="this.value = ''"/>
                <button type="submit" id="submit" class="action-button" style="margin-left: 30%;">Log In</button>
                <br>
                <div id="links_left" style="margin-left:21%;">

                            <a href="forgot-password.php"  >Err..I forgot something :(</a>

			</div>

                <div id="links_right" style="margin-left:27%;"><a href="multistep.php">Get me in...quickly!</a></div>

                   
        
	</fieldset>
            </form>
            </div>
        
        
        
    </body>
</html>

