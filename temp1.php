<?php
    include_once 'DB_Con.php';
    session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Friend Requests</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/footer-distributed-with-contact-form.css">
        <script type="text/javascript" src="js/notifications.js"></script>
        <link rel="stylesheet" href="css/testingMenubar.css">
        
<!--         <script type="text/javascript">
                $(document).ready(function(){
                    $("#acceptFR").click(function () {
                        alert("Accept");
                        $.ajax({
                type:'post'
                url:'friendsStatus.php',
                success: 
                    alert("HII");
                ,
                error:function(exception){
                    alert('Exception:'+exception);
   }
            });
                        
                    });
                    $("#declineFR").click(function () {
                        alert("Decline");
                    });
                });
            </script>-->
     
    </head>
    <body>
        <!-- Menubar begins here-->
             <div id="header" class="header1" style=" background:url('Images/bg1.jpg')0 100% no-repeat; background-size: cover; ">
            <div id="logo">Logo</div>
            <div id="searcharea" class="header1"><input placeholder="search" type="text" id="searchbox"/></div>
            <?php
            $loggedUser=$_SESSION["loggedUser"];
            $usersQuery="select * from profile where email_id='$loggedUser'";
            $profileResults=  mysqli_query($con, $usersQuery);
            $row = mysqli_fetch_array($profileResults);
            $profilePic=$row["picture"];
            ?>
            <div  id="profilearea" class="header1" ><a href="profile.php"><img class="imageCircle" src="<?php echo $profilePic; ?>" alt="<?php echo $profilePic; ?>" width="100" height="100"></a></div>
            
            <ul id="nav">
            <li class="dropdown">
            <a href="#" class="dropdown-toggle">Settings<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="logout.php">Log out</a></li>
            </ul>
            
            
            <li id="notification_li">
            
                <span id="notification_count">3</span>
                <a href="#" id="notificationLink">Notifications</a>

                <div id="notificationContainer">
                <div id="notificationTitle">Notifications</div>
                <div id="notificationsBody" class="notifications">
                    <div class="w3-card w3-yellow">
                    <p>w3-card</p>
                    </div>
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

                      <a href="friendsStatus.php?Acc=true"> <button id="acceptFR"class="w3-btn w3-green" formaction="friendsStatus.php">Accept</button></a>
                      <a href="friendsStatus.php?Dec=true"><button id="declineFR" class="w3-btn w3-red" formaction="friendsStatus.php">Decline</button></a>
                    </div>

                    </div>
                </div>
                <div id="friendFooter"><a href="friendRequest.php">See All</a></div>
                </div>

            </li>
            
            
            </ul>
             </div>
          <!-- Menubar ends here-->
        
       <div id="mainbody" style="margin-top: 10%;">
           
                <div style="align-content: center; font-family: Comic Sans; font-size:20px; font-weight: bold; text-align: center;">Friend requests</div>
                <!-- Friend Requests--> 
                <?php 
                     $break=0;
                      $loggedUser=$_SESSION["loggedUser"];
                      //Finding the friends of logged user
                      $flist=array();
                      $friendList="select *from friend_status where eid1='$loggedUser' AND accepted=1";
                      
                      $friends=mysqli_query($con, $friendList);
                      foreach ($friends as $fr)
                      {
                          $flist[]=$fr["eid2"];
                          
                      }
                      $friendList1="select *from friend_status where eid2='$loggedUser' AND accepted=1";
                      $friends1=mysqli_query($con, $friendList1);
                      foreach ($friends1 as $fr)
                      {
                          $flist[]=$fr["eid1"];
                          echo 'Hii '.$flist[0];
                      }
                      ///////////////////////////////
                        $reqFriendsQuery="select * from friend_status where requested=1 AND eid2='$loggedUser'";
                        $Results=  mysqli_query($con, $reqFriendsQuery);
                        foreach ($Results as $row)
                        {   
                      ?>
                <div id="requests" style= "display: box; -webkit-box-orient:horizontal; padding-bottom: 10%;overflow-y: scroll; width:100%" >
                
                     
                     <div class="w3-card-8 w3-dark-grey" style="width:20%; margin-left: 2%; padding-left: 2%;">

                    <div class="w3-container w3-center">
                        <?php
            $loggedUser=$_SESSION["loggedUser"];
            $RequestedFriend=$row["eid1"];
            $usersQuery="select * from profile where email_id='$RequestedFriend'";
            $profileResults=  mysqli_query($con, $usersQuery);
            $row1 = mysqli_fetch_array($profileResults);
            $profilePic=$row1["picture"];
            
            
            ?>
                      <img src="<?php echo $profilePic;?>" alt="Avatar" style="width:80%">
                      
                      <h5><?php echo $row["eid1"]; $userRequested=$row["eid1"];?></h5>
                      
                      <a href="friendsStatus.php?Acc=true&requested=<?php echo $userRequested ?>"><button class="w3-btn w3-green">Accept</button></a>
                      <a href="friendsStatus.php?Dec=true&requested=<?php echo $userRequested ?>"><button class="w3-btn w3-red">Decline</button></a>
                      
                    </div>
<br>
                    </div>
                    
            </div>
                 <?php 
                        }
                      ?>
                <!-- Friend requests end here-->
                
             <div style="align-content: center; font-family: Comic Sans; font-size:20px; font-weight: bold; text-align: center;">Let's expand your circle!</div>
            <div id="knowthem" style=" height: 50%; display: -webkit-box; -webkit-box-orient:horizontal; padding-bottom:5%;">
                 <!--Start Of 1st column FR-->
                     <?php 
                     $break=0;
                     $myArr=array();
                      
                        $suggestFriendsQuery="select * from friend_status where eid1='$loggedUser'";
                        $Results=  mysqli_query($con, $suggestFriendsQuery);
                        foreach ($Results as $row2)//For 1st Column
                        {   
                            
                            
                                $requested=$row2["eid2"];
                                $suggestFriendsQuery="select * from friend_status where eid1='$requested'";
                                $Results=  mysqli_query($con, $suggestFriendsQuery);
                                foreach ($Results as $suggestions)//Fiends of the value in 2nd column
                                {
                                    //echo 'Hii';
                                    if($suggestions["eid1"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid2"], $myArr) && !in_array($suggestions["eid2"], $flist))
                                    {
                                        $myArr[] = $suggestions["eid2"];
                                        
                      ?>
                <div id="knowthemsub">
                <div class="w3-card-4" style="width:40%; margin-left: 2%; padding-left: 2%;">

                <header class="w3-container w3-light-grey">
                  <h3><?php echo $suggestions["eid2"] ?></h3>
                </header>

                <div class="w3-container">
                  <hr>
                  <?php
                    $suggestedFriend=$suggestions["eid2"];
                    $usersQuery="select * from profile where email_id='$]$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40%">
                  <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
                </div>

                    <a href="friendsStatus.php?connect=<?php echo $suggestedFriend ?>"><button class="w3-btn-block w3-dark-grey">+ Connect</button></a>
                        

</div>
                    
                    </div>
<?php 
                                }
                                }
                                $suggestFriendsQuery="select * from friend_status where eid2='$requested'";
                                $Results=  mysqli_query($con, $suggestFriendsQuery);
                                foreach ($Results as $suggestions)//Inner loop 1
                                {
                                    //echo 'Hii';
                                    if($suggestions["eid1"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid1"], $myArr) && !in_array($suggestions["eid1"], $flist))
                                    {
                                        $myArr[] = $suggestions["eid1"];
                                        
                      ?>
                <div id="knowthemsub">
                <div class="w3-card-4" style="width:40%; margin-left: 2%; padding-left: 2%;">

                <header class="w3-container w3-light-grey">
                  <h3><?php echo $suggestions["eid1"] ?></h3>
                </header>

                <div class="w3-container">
                  <hr>
                  <?php
                    $suggestedFriend=$suggestions["eid1"];
                    $usersQuery="select * from profile where email_id='$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40%">
                  <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
                </div>

                    <a href="friendsStatus.php?connect=<?php echo $suggestedFriend ?>"><button class="w3-btn-block w3-dark-grey">+ Connect</button></a>
                        

</div>
                    
                    </div>
<?php 
                                }
                                }
                            } 
                        
                            ?><!-- End of 1st column FR -->
                            
                            
                            <!--Start Of 2nd column FR-->
                            <?php 
                     $myArr1=array();
                      
                        $suggestFriendsQuery="select * from friend_status where eid2='$loggedUser'";
                        $Results=  mysqli_query($con, $suggestFriendsQuery);
                        foreach ($Results as $row2)//For 2nd Column
                        {   
                            
                            
                                $requested=$row2["eid1"];
                                $suggestFriendsQuery="select * from friend_status where eid1='$requested'";
                                $Results=  mysqli_query($con, $suggestFriendsQuery);
                                foreach ($Results as $suggestions)//Fiends of the value in 2nd column
                                {
                                    
                                    if($suggestions["eid2"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid2"], $myArr1) && !in_array($suggestions["eid2"], $flist))
                                    {
                                        $myArr1[] =$suggestions["eid2"];
                      ?>
                <div id="knowthemsub">
                <div class="w3-card-4" style="width:40%; margin-left: 2%; padding-left: 2%;">

                <header class="w3-container w3-light-grey">
                  <h3><?php echo $suggestions["eid2"] ?></h3>
                </header>

                <div class="w3-container">
                  <hr>
                  
                  <?php
                  
                    $suggestedFriend=$suggestions["eid2"];
                    $usersQuery="select * from profile where email_id='$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40%">
                  <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
                </div>

                    <a href="friendsStatus.php?connect=<?php echo $suggestedFriend ?>"><button class="w3-btn-block w3-dark-grey">+ Connect</button></a>
                        

</div>
                    
                    </div>
<?php 
                                }
                                }
                                //2nd Inner
                                $suggestFriendsQuery="select * from friend_status where eid2='$requested'";
                                $Results=  mysqli_query($con, $suggestFriendsQuery);
                                foreach ($Results as $suggestions)//Fiends of the value in 2nd column
                                {
                                    
                                    if($suggestions["eid1"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid1"], $myArr1) && !in_array($suggestions["eid1"], $flist))
                                    {
                                        $myArr1[] =$suggestions["eid1"];
                      ?>
                <div id="knowthemsub">
                <div class="w3-card-4" style="width:40%; margin-left: 2%; padding-left: 2%;">

                <header class="w3-container w3-light-grey">
                  <h3><?php echo $suggestions["eid1"] ?></h3>
                </header>

                <div class="w3-container">
                  <hr>
                  
                  <?php
                  
                    $suggestedFriend=$suggestions["eid1"];
                    $usersQuery="select * from profile where email_id='$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40%">
                  <p>CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p><br>
                </div>

                    <a href="friendsStatus.php?connect=<?php echo $suggestedFriend ?>"><button class="w3-btn-block w3-dark-grey">+ Connect</button></a>
                        

</div>
                    
                    </div>
<?php 
                                }
                                }
                                //2nd inner end
                            } 
                        
                            ?>
                     <!-- End of 2nd column FR -->
            </div>
             
             <!--Footer-->
    <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Halfpace<span>...Coz everything can't be learned on the Internet!</span></h3>

				<p class="footer-links">
					<a href="#">About us</a>
					Ã‚Â·
					<a href="#">FAQ</a>
					Ã‚Â·
					<a href="#">Contact</a>
				</p>
                                
                                <div class="footer-icons">
                                    <p style='color:white;'>Share us on</p>
                                    <a href="#" style="background:url('Images/fb.png')0 100% no-repeat;"></a>
					<a href="#" style="background:url('Images/twit.jpg')0 100% no-repeat;"></a>
					<a href="#" style="background:url('Images/in.png')0 100% no-repeat;"></a>
					

				</div>

				<p class="footer-company-name">Halfpace Pvt. Ltd. &copy; 2016</p>

				

			</div>

			<div class="footer-right" style='margin-top:-12%;'>

                            <h4>Want to suggest a skill?<br>
                                Or anything else?<br></h4>

				<form action="#" method="post">

					<input type="text" name="email" placeholder="Email" />
					<textarea name="message" placeholder="Message"></textarea>
					<button>Send</button>

				</form>

			</div>

		</footer>
    <!--Footer ends here-->

        </div>
           
    </body>
</html>
