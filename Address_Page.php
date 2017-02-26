 <?php
 include_once 'DB_Con.php';
 ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

     <head>
        <title>Address</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type= "text/javascript" src = "js/countries.js"></script>
        <link type="text/css" rel="stylesheet" href="css/style1.css" media="screen" />
        <link type="text/css" rel="stylesheet" href="css/button.css" media="screen" />
  <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    </head>
    <body>
        
                <!--div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle" -->

                  
                    <br><br>
               
         <div id="header" style="width: 1335px; float:left; height:130px; background: #DCF0F7; margin:10px; padding:5px;">
              <img src="images/logo.png" style="height:130px; width:250px;"/>
            </div>

 <div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

                    <h3> <center> <font size="6" color="Purple">Address</font></center></h3>

			<div id="username_input">
<br>
                  <font size="2" color="Purple">Country:   
                  
                  <!--<select name="countries" id="countries" selected="">
                  </select>-->
                <select name="country" onchange="getCountryID(this.value);">
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
        
        <!--<script>
            $(document).ready(function(){ 
  $('#countries').submit()(function(){ 
    alert($('#countries:selected').text());
  });
});
            </script>
        <script>
    $(document).ready(function(){
                    $('#countries').change(function(){
                     Country=$("#countries option:selected").text();
                   //alert('Value change to ' + $(this).attr('value'));
            });
        });
        </script>-->
                 
                  <br><br>
                  
               State: 
               &nbsp;&nbsp;
               
               <!--<select name="states">
               <%  while(states.next()){ %>
            <option><%= states.getString(2)%></option>
        <% } 
        State=request.getParameter("states");
        %>
        </select>-->
            <select name="states" id="statesList" onchange="getStateID(this.value)">
                <option value=""> Select State</option>
                
            </select>
                  <!--<%
                      cities =statement.executeQuery("select * from cities");// where state_id="+State) ;
                  %>
               <script language="javascript">
               populateCountries("country", "state");
               
                                                </script>-->
                                                
                        </font><br><br>
                        <font size="2" color="Purple">City:
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            
                            <select name="cities" id="citiesList" ">
                                <option value=""> Select City</option>
                                
                            </select>
                        <br>
                        <br>
                        
                        <font size="2" color="Purple"> Contact No.:  <input type="text">
		<br>

		</div>
	
</div>

                	
	<div id="wrapperbottom"></div>
	<!-- content -->
</div><!-- container -->

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

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
               //$("#citiesList").html(data);
           }
       });
    }
    </script>

    </body>
</html>

