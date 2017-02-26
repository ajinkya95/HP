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
        
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="js/notifications.0  js"></script>
        <link rel="stylesheet" href="css/w3.css">
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
        
        <?php
            $loggedUser=$_SESSION["loggedUser"];
            $usersQuery="select * from profile where email_id='$loggedUser'";
            $profileResults=  mysqli_query($con, $usersQuery);
            $row = mysqli_fetch_array($profileResults);
            $profilePic=$row["picture"];
            ?>
        
        <!-- Menubar begins here-->
          <?php include('header.php'); ?>
          <!-- Menubar ends here-->
        
       <div id="mainbody" style="margin-top: 10%; width: 100%">
           
                <div style="align-content: center; font-family: Comic Sans; font-size:20px; font-weight: bold; text-align: center;">Friend requests</div>
                <!-- Friend Requests--> 
                <div id="requests" style= "display:box;  padding-bottom: 10%;overflow-y: scroll; width:100%" >
                
                     <?php 
                    
                      $loggedUser=$_SESSION["loggedUser"];
                      $flist=$_SESSION["flist"];
                      $rlist=$_SESSION["rlist"];
                      print_r($_SESSION['rlist']);
//                      //Finding the friends of logged user
//                      $flist=array();
//                      $friendList="select *from friend_status where eid1='$loggedUser' AND accepted=1";
//                      
//                      $friends=mysqli_query($con, $friendList);
//                      foreach ($friends as $fr)
//                      {
//                          $flist[]=$fr["eid2"];
//                          
//                      }
//                      $friendList1="select *from friend_status where eid2='$loggedUser' AND accepted=1";
//                      $friends1=mysqli_query($con, $friendList1);
//                      foreach ($friends1 as $fr)
//                      {
//                          $flist[]=$fr["eid1"];
//                          echo 'Hii '.$flist[0];
//                      }
//                      
//                      ///////////////////////////////
//                      //Already Requested 
//                      
//                      $rlist=array();
//                      $requestList="select * from friend_status where eid1='$loggedUser' AND requested=1";
//                      $requestedfriends=mysqli_query($con, $requestList);
//                      foreach ($requestedfriends as $fr)
//                      {
//                          $rlist[]=$fr["eid2"];
//                          
//                      }
//                      $requestList1="select *from friend_status where eid2='$loggedUser' AND requested=1";
//                      $requestedfriends1=mysqli_query($con, $requestList1);
//                      foreach ($requestedfriends1 as $fr1)
//                      {
//                          $rlist[]=$fr1["eid1"];
//                      }
//                      
//                      //////////////
                        $reqFriendsQuery="select * from friend_status where requested=1 AND eid2='$loggedUser'";
                        $Results=  mysqli_query($con, $reqFriendsQuery);
                        foreach ($Results as $row)
                        {   
                            //printf($Results);
                      ?>
                      
                     <div class="w3-card-8 w3-dark-grey" style="width:17%; height:180px; margin: 2%; padding: 2%; float: left;">

                         <div class="w3-container w3-center" style="width: 100%; height: 105%; margin:0; padding-left: 2%; margin-top: -12%;">
                        <?php
            $loggedUser=$_SESSION["loggedUser"];
            $RequestedFriend=$row["eid1"];
            $usersQuery="select * from profile where email_id='$RequestedFriend'";
            $profileResults=  mysqli_query($con, $usersQuery);
            $row1 = mysqli_fetch_array($profileResults);
            $profilePic=$row1["picture"];
            
            
            ?>
                      <img src="<?php echo $profilePic;?>" alt="Avatar" style="width:85%; height: 100%;">
                      
                      <h5><?php echo $row["eid1"]; $userRequested=$row["eid1"];?></h5>
                      
                      <a href="friendsStatus.php?Acc=true&requested=<?php echo $userRequested ?>"><button class="w3-btn w3-green">Accept</button></a>
                      <a href="friendsStatus.php?Dec=true&requested=<?php echo $userRequested ?>"><button class="w3-btn w3-red">Decline</button></a>
                      
                    </div>
<br>
                    </div>
                     <?php 
                        }
                      ?>
            </div>
                <!-- Friend requests end here-->
                
                <!--Friends Suggestions start here -->
<!--                <div id="requests" style= "display:box;  padding-bottom: 10%;overflow-y: scroll; width:100%" >-->
             <div style="align-content: center; font-family: Comic Sans; font-size:20px; font-weight: bold; text-align: center;">Let's expand your circle!</div>
            <div id="knowthem" style=" display:box; padding-bottom: 10%;overflow-y: scroll; width:100%; ">
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
                                    if($suggestions["eid1"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid2"], $myArr) && !in_array($suggestions["eid2"], $flist) && !in_array($suggestions["eid2"], $rlist))
                                    {
                                        $myArr[] = $suggestions["eid2"];
                                        
                      ?>
                  <div class="w3-card-8 w3-white" style="width:17%; height:180px; margin: 2%; padding: 2%; float: left;">

                         <div class="w3-container w3-center" style="width: 100%; height: 105%; margin:0; padding-left: 2%; margin-top: -12%;">
<!--                 <div id="knowthemsub" style="display: block; width:20%;" >
                <div class="w3-card-8" >-->
<div class="w3-container">
              
                  <?php
                    $suggestedFriend=$suggestions["eid2"];
                    $usersQuery="select * from profile where email_id='$]$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left imageCircle" style="width:35%">
                 
                </div>
               
                  <h3 ><?php echo $suggestions["eid2"] ?></h3>
                

                

                    <a href="friendsStatus.php?connect=<?php echo $suggestedFriend ?>"><button class="w3-btn-block w3-blue-grey">+ Connect</button></a>
                        

</div>
                    
                 </div><br>
<?php 
                                }
                                }
                                $suggestFriendsQuery="select * from friend_status where eid2='$requested'";
                                $Results=  mysqli_query($con, $suggestFriendsQuery);
                                foreach ($Results as $suggestions)//Inner loop 1
                                {
                                    //echo 'Hii';
                                    if($suggestions["eid1"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid1"], $myArr) && !in_array($suggestions["eid1"], $flist) && !in_array($suggestions["eid1"],$rlist))
                                    {
                                        $myArr[] = $suggestions["eid1"];
                                        
                      ?>
                <div class="w3-card-8 w3-white" style="width:17%; height:180px; margin: 2%; padding: 2%; float: left;">

                         <div class="w3-container w3-center" style="width: 100%; height: 105%; margin:0; padding-left: 2%; margin-top: -12%;">
           
 <div class="w3-container">
                  <hr>
                  <?php
                    $suggestedFriend=$suggestions["eid1"];
                    $usersQuery="select * from profile where email_id='$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left imageCircle w3-margin-right" style="width:40%">
                  <br>
                </div>
                
                  <h3><?php echo $suggestions["eid1"] ?></h3>
                

               

                    <a href="friendsStatus.php?connect=<?php echo $suggestedFriend ?>"><button class="w3-btn-block w3-blue-grey">+ Connect</button></a>
                        

</div>
                    
                    </div>
<?php 
                                }
                                }
                            } 
                        
                            ?><!-- End of 1st column FR -->
                            
                            
                            <!--Start Of 2nd column FR-->
                            <?php 
                      
                        $suggestFriendsQuery="select * from friend_status where eid2='$loggedUser'";
                        $Results=  mysqli_query($con, $suggestFriendsQuery);
                        foreach ($Results as $row2)//For 2nd Column
                        {   
                            
                            
                                $requested=$row2["eid1"];
                                $suggestFriendsQuery="select * from friend_status where eid1='$requested'";
                                $Results=  mysqli_query($con, $suggestFriendsQuery);
                                foreach ($Results as $suggestions)//Fiends of the value in 2nd column
                                {
                                    
                                    if($suggestions["eid2"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid2"], $myArr) && !in_array($suggestions["eid2"], $flist) && !in_array($suggestions["eid2"], $rlist))
                                    {
                                        $myArr[] =$suggestions["eid2"];
                      ?>
                        <div class="w3-card-8 w3-white" style="width:17%; height:180px; margin: 2%; padding: 2%; float: left;">

                        <div class="w3-container w3-center" style="width: 100%; height: 105%; margin:0; padding-left: 2%; margin-top: -12%;">
           
<div class="w3-container">
                 
                  
                  <?php
                  
                    $suggestedFriend=$suggestions["eid2"];
                    $usersQuery="select * from profile where email_id='$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:40%">
                  
                </div>
               
                  <h3><?php echo $suggestions["eid2"] ?></h3>
               

                

                    <a href="friendsStatus.php?connect=<?php echo $suggestedFriend ?>"><button class="w3-btn-block w3-blue-grey">+ Connect</button></a>
                        

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
                                    
                                    if($suggestions["eid1"]!=$loggedUser && $suggestions["eid2"]!=$loggedUser && !in_array($suggestions["eid1"], $myArr) && !in_array($suggestions["eid1"], $flist) && !in_array($suggestions["eid1"], $rlist))
                                    {
                                        $myArr[] =$suggestions["eid1"];
                      ?>
                        <div class="w3-card-8 w3-white" style="width:17%; height:180px; margin: 2%; padding: 2%; float: left;">

                        <div class="w3-container w3-center" style="width: 100%; height: 100%; margin:0; padding-left: 2%; margin-top: -12%;">

              <div class="w3-container">
              
                  
                  <?php
                  
                    $suggestedFriend=$suggestions["eid1"];
                    $usersQuery="select * from profile where email_id='$suggestedFriend'";
                    $profileResults=  mysqli_query($con, $usersQuery);
                    $row1 = mysqli_fetch_array($profileResults);
                    $profilePic=$row1["picture"];
            ?>
                  <img src="<?php echo $profilePic ?>" alt="Avatar" class="w3-left imageCircle w3-margin-right" style="width:40%; float:left;">
                  
                </div>
                            
                            <h3 style="float: right; margin-top: -20%;"><?php echo $suggestions["eid1"] ?></h3>
             

                

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
             <!--Friends Suggestions ends here -->
             <!--Footer-->
   <?php include('footer.php'); ?>
    <!--Footer ends here-->

        </div>
           
    </body>
</html>
