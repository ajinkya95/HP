<!doctype html>
<?php
include 'DB_Con.php';
session_start();
$loggedUser=$_SESSION["loggedUser"];
?>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="HandheldFriendly" content="true">
  <title>Profile</title>
  <meta name="author" content="Abhishek Kshirsagar">
  <link rel="stylesheet" href="css/w3.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/profile.css">
  <link rel="stylesheet" href="css/testingMenubar.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href=
      "css/style.css"/>
<link rel="stylesheet" href=
      "css/style3.css"/>
<link rel="stylesheet" href=
      "css/button.css"/>

  <link rel="shortcut icon" href="kitten.jpg">
  <link rel="icon" href="kitten.jpg">

            
            <script>
            function myFormSubmit(){
                $(".container").hide();
                $(".container").style.display="none";
                $('.container').css("z-index","0");
            }
            
            function myUpdate(){
                $(".container").show();
                $(".container").style.display="block";
                $('.container').css("z-index","3");
              
            }
            function myUpload(){
                $("#picupload").toggle();
                $("#picupload").style.display="block";
              
            }
            function myStopUpload(){
                $("#picupload").hide();
                $("#picupload").style.display="none";
              
            }
            </script>          
            
</head>

<body>
<!-- Menubar begins here-->
             <?php include('header.php'); ?>
          <!-- Menubar ends here-->
         
    
    <div id="superWrapper" style="margin-top: 10%; width:100%;">
  <div id="w" style=" width: 65%; margin-left:2%;">
    <div id="content" class="clearfix">
        <h1 style="font-family: Comic Sans;">Profile</h1>
        
        
        <!--For uploading a profile picture-->
        <!--http://www.w3schools.com/php/php_file_upload.asp-->
        <?php
        if(isset($_GET['upload']) && $_FILES['file']['tmp_name']!=NULL){
            
        move_uploaded_file($_FILES['file']['tmp_name'], "User_Images/".$_FILES['file']['name']);
        $uploadQuery="UPDATE profile SET picture= 'User_Images/".$_FILES['file']['name']."' WHERE email_id='$loggedUser'";
        mysqli_query($con,$uploadQuery);
                
        }
        
        ?>
        <?php
        //Code for getting the profile image  
            
           
           
            if(isset($_POST['remove'])){
            $uploadQuery="UPDATE profile SET picture= 'User_Images/avatar.png' WHERE email_id='$loggedUser'";
               mysqli_query($con,$uploadQuery);
        }
         $usersQuery="select * from profile where email_id='$loggedUser'";
            $profileResults=  mysqli_query($con, $usersQuery);
            $row = mysqli_fetch_array($profileResults);
         $profilePic=$row["picture"];
                        //////////////////////////////
                        ?>
        
        
         <div id="userphoto"><img src="<?php
                if ($profilePic == ""){
                    echo "Images//avatar.png";
                }else{
                echo $profilePic;}
                ?>" alt="<?php
                if ($profilePic == ""){
                echo "Avatar";}
                else
                echo $profilePic ?>"
                width="300" height="300" style="cursor:zoom-in;" onclick="document.getElementById('bigpic').style.display='block'">
             <div id="bigpic" class="w3-modal" onclick="this.style.display='none'" style="margin-top: 5%;">
                  <span class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright">&times;</span>
                  <div class="w3-modal-content w3-animate-zoom">
                    <img src="<?php
                if ($profilePic == ""){
                    echo "Images//avatar.png";
                }else{
                echo $profilePic;}
                ?>" alt="<?php
                if ($profilePic == ""){
                echo "Avatar";}
                else
                echo $profilePic ?>" style="width:100%">
                  </div>
                </div>
        </div>
        <div class="w3-tooltip" style="float: right; margin-right: 36%;margin-top: -2%;"><image type="button" onclick="document.getElementById('picupload').style.display='block'"  src="Images/edit.png" style="cursor: pointer;"/><span style="position:absolute;left:0;bottom:18px" 
class="w3-text w3-tag">Upload your profile picture</span></div>
          
        <div id="picupload" class="w3-modal">
            <div class="w3-modal-content w3-card-8 w3-animate-bottom" style="margin-top: 10%; width: 50%;">
                <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('picupload').style.display='none'" 
      class="w3-closebtn">&times;</span>
      <h2>Upload your profile picture</h2></header>
                <form id="uploadPic" action ="" method="post" enctype="multipart/form-data">
                    <div style="margin-left: 40%; margin-top: 1%; margin-bottom:1%;">  <input  onclick= "myStopUpload()" type="submit" value="remove" name="remove profile picture">
           </div>
                    
                    <div style="margin-left: 40%; margin-top: 1%;">   <input  type="file" name="picFile" ></div>
                        
           <div style="margin-left: 40%; margin-top: 1%; margin-bottom:1%;">  <input  onclick= "myStopUpload()" type="submit" name="upload" >
           </div>
               </form>
            <footer class="w3-container w3-teal">
      <p>Bdw, you really look good ;)</p>
    </footer>
            </div></div>
         <!--Lets hope that profile pic has been uploaded. Pray for the same. Seriously, pray!-->
      <div id="profilespecs">
      <nav id="profiletabs">
          
         <button type="button" id="updateProfile" class="w3-btn" onclick="document.getElementById('myPopup').style.display='block'">Update profile</button></a>

    <div class="w3-modal" id="myPopup" style="display: none;" >
<div class="main w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:600px; margin-left: 40%;">
    <div class="w3-center">   
<h2>Update Profile: </h2>
<span onclick="document.getElementById('myPopup').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
</div> 
    <form id="Register" class="w3-container" method="post" name="update" action="profUpdate.php">
 <br/>   
 <!--<label class="required">Username :</label>
<input type="text" name="username" id="reg_username"/>
-->
<label class="required" for="status">Status</label>
<input type="text" id="status" name="status" placeholder="Status"/>
<br>
<label class="required" for="mno">Mobile Number:</label>
<input type="text" name="mno" id="mno" placeholder="0123456789"/>
<br>
<label class="required">Enter Password :</label>
<input type="password" name="password" id="reg_password"/>
<br>
<label class="required">Confirm Password :</label>
<input type="password" name="password" id="reg_confirm_password"/>
<br>
<label class="required" for="privacyStat">Privacy Status</label><br> <input type="radio" name="privacyStat" value="Public"> Public<br> <input type="radio" name="privacyStat" value="Private"> Private
           
            <button type="submit" id="submit" class="w3-btn" onclick="document.getElementById('myPopup').style.display='none'">Update</button>
</form>
<!--<span><b >Note : </b> <b class="note"> * </b> fields are compulsory <br/></span>-->

</div>
</div>
        <ul class="clearfix">
            <?php
        //Code for getting the profile of the logged user
            $profileBio=$row["bio"];
                        //////////////////////////////
                        ?>
          <li><a href="#bio" class="sel">Bio</a></li>
          
          <li><a href="#activity">Activity</a></li>
          <li><a href="#friends">Friends</a></li>
        </ul>
      </nav>
          </div>
      
      <section id="bio">
       <?php echo $profileBio ?>
      </section>
      
      <section id="activity" class="hidden">
        <p>Most recent actions:</p>
        <?php 
        
        $activityQuery="select * from activity where email_id='$loggedUser' order by timestamp  ";
        $activities=  mysqli_query($con, $activityQuery);
//        $Query="insert into activity (email_id,timestamp) values (CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);";
//        mysqli_query($con, $Query);
                                foreach ($activities as $activity)//Fiends of the value in 2nd column
                                {
        
        ?>
                                    <p class="activity"><?php echo $activity["description"] ?> at <?php $activityTimestamp=$activity["timestamp"]; echo $activityTimestamp;?> OR <?php date_default_timezone_set('Asia/Calcutta');$time=date('Y-m-d G:i:s');echo ($time-$activityTimestamp)?></p>
        <?php 
                                }
        ?>
        
<!--        <p class="activity">Activity 2</p>
        
        <p class="activity">Activity 3</p>
        
        <p class="activity">Activity 4</p>
        
        <p class="activity">Activity 5</p>-->
      </section>
      
      <section id="friends" class="hidden">
        <p>Friends list:</p>
        
        <ul id="friendslist" class="clearfix">
            <!--Code for displaying friends-->
            <?php 
                    $profileQueryRequested="select * from friend_status where eid1='$loggedUser' AND accepted=1";
                        $profileResultsReq=  mysqli_query($con, $profileQueryRequested);
                        $profileQueryAccepted="select * from friend_status where eid2='$loggedUser' AND accepted=1";
                        $profileResultsAcc=  mysqli_query($con, $profileQueryAccepted);
                        
                    //loop
                    foreach ($profileResultsReq as $rowReq){
                            ?>
            <li><a href="friendsprof.php?redirectName=<?php echo $rowReq["eid2"] ?>"><img src="Images/avatar.png" width="22" height="22"><?php echo $rowReq["eid2"] ?></a></li>
            <?php 
                    }
            ?>
          <?php 
                    //loop
                    foreach ($profileResultsAcc as $rowAcc){
                          ?>
                    <li><a href="friendsprof.php?redirectName=<?php echo $rowAcc["eid1"] ?>" method="post"><img src="Images/avatar.png" width="22" height="22"><?php echo $rowAcc["eid1"] ?></a></li>
            <?php 
                    }
            ?>
                    <!--End of Code for displaying friends-->
          <!--<li><a href="#"><img src="Images/avatar.png" width="22" height="22"> SomeGuy123</a></li>
          <li><a href="#"><img src="Images/avatar.png" width="22" height="22"> PurpleGiraffe</a></li>-->
        </ul>
      </section>
      
   
      
    </div><!-- @end #content -->
 
  </div><!-- @end #w -->
  <?php
  $skillsQuery="select * from users_skills where email='$loggedUser'";
            $results=  mysqli_query($con, $skillsQuery);
            $skillRow = mysqli_fetch_array($results);
         $skillArray = ["email","skill1","skill2","skill3","skill4","skill5","skill6","skill7","skill8","skill9","skill10","skill11","skill12","skill13","skill14","skill15",
             "req1","req2","req3","req4","req5","req6","req7","req8","req9","req10",""];
         
         
  ?>
   <div id="w2" style=" width: 30%; float:right; margin-left:2%;">
    <div id="content2" class="clearfix">
        <h1 style="font-family: Comic Sans;">Update</h1>
      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#Skills" class="sel">Skills</a></li>
          <li><a href="#Requirements">Requirements</a></li>
        </ul>
      </nav>
      
        <section id="Skills" >
            <div>
                <?php
                $i=0;
                
                while(($skillRow[$skillArray[$i]])){
                    $i++;
                    ?>
                <div class="w3-center w3-card-8 w3-cyan"><font style="font-family: verdana; font-size: 20px; font-weight: bold;"><?php echo $skillRow[$skillArray[$i]] ?></font></div><br>
                        <?php
                        if ($i===15){
                            break;
                        }
                }
                ?>
            </div>
            <a href="try.php" ><input type="button" class="w3-btn" name="skillUpdate" value="Update Your Skills"></a>
      </section>
      
        <section id="Requirements" class="hidden" >
            <div class="w3-container">
                <?php
                $i=16;
                
                while(($skillRow[$skillArray[$i]])){
                  
                    ?>
                <div class="w3-center w3-card-8 w3-aqua"><font style="font-family: verdana; font-size: 20px; font-weight: bold;"><?php echo $skillRow[$skillArray[$i]] ?></font></div><br>
                        <?php
                  $i++;
                  if ($i===26){
                            break;
                        }
                }
                ?>
            </div>
        <input type="button" class="w3-btn" name="reqUpdate" value="Update Your Requirements">
      </section>
      
    </div><!-- @end #content2 -->
   
  </div><!-- @end #w2 -->
<!--Footer-->
    <?php include('footer.php'); ?>
    <!--Footer ends here-->
   
  </div><!-- @end #superWrapper -->
  
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden');
      }
    });
    $('#content2 section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden');
      }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>
</body>
</html>
