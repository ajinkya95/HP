<?php
 include_once 'DB_Con.php';
 ?>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  
        <script> //jQuery time
$(function() {

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
if(animating) return false;
animating = true;

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//activate next step on progressbar using the index of next_fs
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show(); 
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now, mx) {
//as the opacity of current_fs reduces to 0 - stored in "now"
//1. scale current_fs down to 80%
scale = 1 - (1 - now) * 0.2;
//2. bring next_fs from the right(50%)
left = (now * 50)+"%";
//3. increase opacity of next_fs to 1 as it moves in
opacity = 1 - now;
current_fs.css({'transform': 'scale('+scale+')'});
next_fs.css({'left': left, 'opacity': opacity});
}, 
duration: 800, 
complete: function(){
current_fs.hide();
animating = false;
}, 
//this comes from the custom easing plugin
easing: 'easeInOutBack'
});
});

$(".previous").click(function(){
if(animating) return false;
animating = true;

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//de-activate current step on progressbar
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show(); 
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now, mx) {
//as the opacity of current_fs reduces to 0 - stored in "now"
//1. scale previous_fs from 80% to 100%
scale = 0.8 + (1 - now) * 0.2;
//2. take current_fs to the right(50%) - from 0%
left = ((1-now) * 50)+"%";
//3. increase opacity of previous_fs to 1 as it moves in
opacity = 1 - now;
current_fs.css({'left': left});
previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
}, 
duration: 800, 
complete: function(){
current_fs.hide();
animating = false;
}, 
//this comes from the custom easing plugin
easing: 'easeInOutBack'
});
});
//$('.submit action-button').click(function(e) {
//    e.preventDefault(); // prevent the link's default behaviour
//    $('#try.php').submit(); // trigget the submit handler
//});
////
//$( "#try.php" ).submit(function(){
//     event.preventDefault();
////}
$(".submit").click(function(a){
//return false;
   a.preventDefault();
});

});
    </script>
    <style>
   #msform {
width: 400px;
margin: 50px auto;
text-align: center;
position: relative;
}
#msform fieldset {
background: white;
border: 0 none;
border-radius: 3px;
box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
padding: 20px 30px;
box-sizing: border-box;
width: 80%;
margin: 0 10%;
/*stacking fieldsets above each other*/
position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
display: none;
}
/*inputs*/
#msform input, #msform textarea {
padding: 15px;
border: 1px solid #ccc;
border-radius: 3px;
margin-bottom: 10px;
width: 100%;
box-sizing: border-box;
font-family: montserrat;
color: #2C3E50;
font-size: 13px;
}

.sel{
 padding: 15px;
border: 1px solid #ccc;
border-radius: 3px;
margin-bottom: 10px;
width: 100%;
box-sizing: border-box;
font-family: montserrat;
color: #2C3E50;
font-size: 13px;   
}

/*buttons*/
#msform .action-button {
width: 100px;
background: #27AE60;
font-weight: bold;
color: white;
border: 0 none;
border-radius: 1px;
cursor: pointer;
padding: 10px 5px;
margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
font-size: 15px;
text-transform: uppercase;
color: #2C3E50;
margin-bottom: 10px;
}
.fs-subtitle {
font-weight: normal;
font-size: 13px;
color: #666;
margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
margin-bottom: 30px;
overflow: hidden;
/*CSS counters to number the steps*/
counter-reset: step;
}
#progressbar li {
list-style-type: none;
color: red;
text-transform: uppercase;
font-size: 9px;
width: 33.33%;
float: left;
position: relative;
}
#progressbar li:before {
content: counter(step);
counter-increment: step;
width: 20px;
line-height: 20px;
display: block;
font-size: 10px;
color: #333;
background: white;
border-radius: 3px;
margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
content: '';
width: 100%;
height: 2px;
background: black;
position: absolute;
left: -50%;
top: 9px;
z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
/*connector not needed before the first step*/
content: none;
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
background: #27AE60;
color: white;
}
    </style>
        <script>
            
             function validateLoginForm()
	{
            
	
        var password = document.reg_form.pass.value;
        var email = document.reg_form.email.value;
        var cpassword = document.reg_form.cpass.value;
        var fname = document.reg_form.fname.value;
        var lname = document.reg_form.lname.value;
        var phone = document.reg_form.phone.value;
        var country = document.reg_form.country.value;
        var states = document.reg_form.states.value;
        var cities = document.reg_form.cities.value;
        var street = document.reg_form.street.value;
        var atpos=email.indexOf("@");
        var dotpos=email.lastIndexOf(".");
        var phoneno = /^\d{10}$/; 
   
	 if(email==="")
        {
            alert("Enter email");
            return false;
        }
        else if(atpos<1|| dotpos<atpos+2 || dotpos+2>=email.length)
        {
            alert("Not a valid email");
            return false;
        }
        else if(password==="")
        {
            alert ("Enter Password");
            return false;
            
        }
        else if(cpassword==="")
        {
            alert ("Confirm the Password");
            return false;
        }
        else if(cpassword!==password)
        {
            alert("Password not matched");
            return false;
        }
        else if ( fname === "" ){
	alert ("Enter first Name");
	return false;
        }
        else if(lname === "")
        {
         alert ("Enter last Name");
	return false;   
        }
        else if(phone === "")
        {
         alert ("Enter Phone Name");
	return false;   
        }
        else if(!(/^\d{10}$/.test(val)))  
        {  
            alert ("Enter Correct Phone number");
            return false; 
        }  
        else if(country === "")
        {
         alert ("Enter Country Name");
	return false;   
        }
        else if(states === "")
        {
         alert ("Enter State");
	return false;   
        }
        else if(cities === "")
        {
         alert ("Enter City");
	return false;   
        }
        else if(street === "")
        {
         alert ("Enter Street Name");
	return false;   
        }  
        
       

}
</script>
      


    </head>
    <body>
        <!-- multistep form -->
        <form id="msform" name="reg_form" method="post" onsubmit="return validateLoginForm()" action="RegisterUser.php">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Account Setup</li>
                <li>Personal Details</li>
		<li>Social Profiles</li>
		
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Create your account</h2>
		<h3 class="fs-subtitle">Account details!!</h3>
                <input type="text" id="email" name="email" placeholder="Email" maxlength="50"/>
                <input type="password" name="pass" placeholder="Password" maxlength="50"/>
                <input type="password" name="cpass" placeholder="Confirm Password" maxlength="50"/>
		<input type="button" name="next1" class="next action-button" value="Next" />
	</fieldset>
        
                
        	<fieldset>
                    <h2 class="fs-title">Social Profiles</h2>
		<h3 class="fs-subtitle">Profile  Details!!</h3>
                    
		
                <input type="text" name="fname" placeholder="First Name" maxlength="25"/>
                <input type="text" name="lname" placeholder="Last Name" maxlength="25"/>
                <input type="text" name="phone" placeholder="Phone" maxlength="10"/>
                Upload picture
		 <input type="file" name="pic" accept="image/*" />
                 <div style="margin-left: 40%; margin-top: 1%; margin-bottom:1%;">  <input  onclick= "myStopUpload()" type="submit" name="upload" >
           </div>
		
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
        
        <fieldset>
		<h2 class="fs-title">Address details!!</h2>
                
                
                
                <select class="sel" name="country" onchange="getCountryID(this.value);">
                    <option value=""> Select Country</option>
                    <?php
                    $query="select * from countries";
                    $results=  mysqli_query($con, $query);
                    //loop
                    foreach ($results as $country){
                        ?>
                    <option value="<?php echo $country["Country_ID"];?>"> <?php echo $country["Country_Name"];?></option>
                    <?php
                    }
                    ?>
                </select>
               
                <select class="sel" name="states" id="statesList" onchange="getStateID(this.value)">
                <option value=""> Select State</option>
                
            </select>
                
		<br>
                       
                            
                            <select class="sel" name="cities" id="citiesList" >
                                <option value=""> Select City</option>
                                
                            </select>
                        <br>
                       
                        
               
                        <input type="text" name="street" placeholder="Street Address/Area/Sector" maxlength="100"/>
                   
		<input type="button" name="previous" class="previous action-button" value="Previous" />
                 <input type="submit" class="action-button" value="Submit" />
		 </fieldset>
        
	
	
</form>
        
      
  <script>
    function getCountryID(val){
       $.ajax({
           
           type:"POST",
           url:"States.php",
           data:"cid="+val,
           success: function(data){
               $("#statesList").html(data);
           }
       });
    }
    </script>
    <script>
    function getStateID(val){
       $.ajax({
           
           type:"POST",
           url:"Cities.php",
           data:"cid="+val,
           success: function(data){
               $("#citiesList").html(data);
           }
       });
    }
    </script>

<!-- jQuery -->

    </body>
</html>
  
