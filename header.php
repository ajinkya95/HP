<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if($_SESSION['logged_in']!=true)
            {
                header( "refresh:0; url=login.php" );
            }
            else 
            {
                
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halfpace</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="HandheldFriendly" content="true">
            <link rel="stylesheet" href="css/w3.css">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript" src="js/notifications.js"></script>
            <link rel="stylesheet" href="css/testingMenubar.css">
    </head>
    <body>
        <!-- Menubar begins here-->
             <div id="header" class="header1" style="background:url('Images/bg1.jpg')0 100% no-repeat;  background-size: cover; ">
            <div id="logo">Logo</div>
            <div id="searcharea" class="header1"><input placeholder="search" type="text" id="searchbox"/></div>
            <?php
            
            $loggedUser=$_SESSION["loggedUser"];
            $usersQuery="select * from profile where email_id='$loggedUser'";
            $nameQuery="select * from users where email_id='$loggedUser'";
            $profileResults=  mysqli_query($con, $usersQuery);
            $nameResults=  mysqli_query($con, $nameQuery);            
            $row = mysqli_fetch_array($profileResults);
            $nameRow=mysqli_fetch_array($nameResults);;
            $profilePic=$row["picture"];
            ?>
            <div id="profilename" class="header1"><h4> <?php echo $nameRow["name"];?></h4></div>
            <div  id="profilearea" class="header1" ><a href="profile.php"><img class="imageCircle" src="<?php echo $profilePic; ?>" alt="<?php echo $profilePic; ?>" width="100" height="100"></a></div>
            
            <ul id="nav">
            <li><a href="logout.php">Log out</a></li>
              
            
            
            <li id="notification_li">
            
                <span id="notification_count">3</span>
                <a href="#" id="notificationLink">Notifications</a>

                <div id="notificationContainer">
                <div id="notificationTitle">Notifications</div>
<<<<<<< HEAD
                <div id="notificationsBody" class="notifications" >
                    <div class="w3-card w-color1">
                        <p> <p>xyz accepted your request for abc </p>
                        <p>  <a href="header.php" title="Please do not share this contact with anybody else"><button id="vcontact" class="notification_buttons"> View contact</button></a>
                        </p>   </p>
                    </div>
                    
                    <div class="w3-card w-color2 ">
                        
                        <p>
                        <p>  xyz sent you the request for abc</p>
                        <p>  <button id="vcontact" class="notification_buttons"> View</button></p>
                        </p></div>
                  
                    <div class="w3-card w-color3">
                        <p> <p>xyz  endorsed you for abc</p>
                        <p><button id="vcontact" class="notification_buttons"> View</button></p>
                        </p>
                    </div>
=======
                <div id="notificationsBody" class="notifications">
                     <div class="w3-card w-color1">
                       <p> <p>xyz accepted your request for abc </p>
                       <p>  <a href="header.php" title="Please do not share this contact with anybody else"><button id="vcontact" class="notification_buttons"> View contact</button></a>
                       </p>   </p>
                   </div>
                   
                   <div class="w3-card w-color2 ">
                       
                       <p>
                       <p>  xyz sent you the request for abc</p>
                       <p>  <button id="vcontact" class="notification_buttons"> View</button></p>
                       </p></div>
                 
                   <div class="w3-card w-color3">
                       <p> <p>xyz  endorsed you for abc</p>
                       <p><button id="vcontact" class="notification_buttons"> View</button></p>
                       </p>
                   </div>
             
>>>>>>> origin/master
                </div>
                <div id="notificationFooter"><a href="notification.php">See All</a></div>
                </div>
                
            </li>
            
            <li id="friend_li">
            
                <span id="friend_count">3</span>
                <a href="#" id="friendLink">Friend Requests</a>

                <div id="friendContainer">
                <div id="friendTitle">Friend Requests</div>
                <div id="friendBody" class="notifications">
                    <div class="w3-card-8 w3-dark-grey">

                    <div class="w3-container w3-center">
                      <img src="Images/timepass.jpg" alt="Avatar" style="width:80%">
                      <h5>John Doe</h5>

                      <button id="acceptFR " name="acceptFR" onclick="friendAcc(this.value);" class= "w3-btn w3-green" >Accept</button>
                      <button id="declineFR" name="declineFR" class="w3-btn w3-red">Decline</button>
                      
                    </div>

                    </div>
                </div>
                <div id="friendFooter"><a href="friendRequested.php">See All</a></div>
                </div>

            </li>
            
            <li><a href="home.php">Home</a></li>
            </ul>
             </div>
          <!-- Menubar ends here-->
    </body>
</html>
<?php
            }
?>