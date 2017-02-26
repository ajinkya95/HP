
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include 'DB_Con.php';
session_start();
?>
<html>
    <head>
            <title>Halfpace</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="HandheldFriendly" content="true">
            <link rel="stylesheet" href="css/w3.css">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           
            <link rel="stylesheet" href="css/testingMenubar.css">
            <link rel="stylesheet" href="css/footer-distributed-with-contact-form.css">

            <script type="text/javascript">
                jQuery(document).ready(function() {
                  jQuery(".content").hide();
                  //toggle the componenet with class msg_body
                  jQuery(".heading").click(function()
                  {
                    $('.heading').not(this).next(".content").hide(500);  
                    jQuery(this).next(".content").slideToggle(500);
                    
                  });
                });
            </script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    
        function friendAcc(value){
            $.ajax({
                type:'post'
                url:'friendsStatus.php',
                success: 
                    alert("Hii");
                ,
                error:function(exception){
                    alert('Exception:'+exception);
   }
            });
        };
    
    </script>

       
            

            <link rel="stylesheet" href="css/testingMenubar.css">
     </head>
     <body onload="document.refresh();">
         <?php include('header.php'); ?>
<!--body-->
                        <?php
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
                              $_SESSION['flist']=$flist;
                      
                    

                      //Already Requested 
                      $rlist=array();
                      $requestList="select * from friend_status where eid1='$loggedUser' AND requested=1";
                      $requestedfriends=mysqli_query($con, $requestList);
                      foreach ($requestedfriends as $fr)
                      {
                          $rlist[]=$fr["eid2"];
                          
                      }
                      $requestList1="select *from friend_status where eid2='$loggedUser' AND requested=1";
                      $requestedfriends1=mysqli_query($con, $requestList1);
                      foreach ($requestedfriends1 as $fr1)
                      {
                          $rlist[]=$fr1["eid1"];
                      }
                      $_SESSION['rlist']=$rlist;
                      ?>
<div id='checking'>
            <div id="centerbody">
                <div id="leftboxes">
                    <div id="trending">
                        <br><b>Trending</b>
                        <br><br>
                    <?php
                        //mysqli_query($con,"select * from trends order by count desc");
                    $trendsQuery="select * from trends order by count desc";
                    $results=  mysqli_query($con, $trendsQuery);
                    $index=1;
                    //loop
                    foreach ($results as $trends){
                        ?>
                    <b class="tendsOnHover"><?php echo "$index . ";echo $trends["skillname"];?></b>
                    <br><br>
                    <?php
                    $index++;
                    }
                    ?>
                    </div>
                    <div id="ad1"><h4>Advertisements</h4></div>
                </div>

                <div id="feed">
                    <div class="layer1">
                        <?php $skillsQuery="select * from skillsstatus "
                                     . "where accepted=0 AND requested=1";
                        
                    $skillsResults= mysqli_query($con, $skillsQuery);
                    
                    $className="headingAccept";
                    
                    $id=1;
                    //loop
                    foreach ($skillsResults as $user){
                        $userAccepted=$user["eid2"];
                        
                        //Code for getting the profile image  
                        $profileQuery="select * from profile where email_id='$userAccepted'";
                        $profileResults=  mysqli_query($con, $profileQuery);
                        $row = mysqli_fetch_array($profileResults);
                        $acceptedPic=$row["picture"];
                        //////////////////////////////
                            ?>
                    <br>
                    <div class='heading' id='hide'>
                             <label class='name'></label>
        
                         <label class='hardcontent'> <?php echo $userAccepted; ?> accepted your request for</label>
                         <label class='name'> <?php echo $user["requestedSkill"] ?></label>
                    </div>
                    <div class='content' id=''<?php $id;?> >
                        <table>
                            <tr><td><div class="" style='width: 100px; height: 100px'><img src="<?php echo $acceptedPic ?>" alt='Profile' width='100' height='100'></div>
                            <td> <div class='details'><b>This is my status</b><br>Contact no.: 8983319502<br> At Post Barav,Junnar.</div>
                        </tr>
                        </table>
                    </div>
                    <?php
                 $id++;
                    }; 
                    ?>
                    <?php $query="select * from posts";
                    $results=  mysqli_query($con, $query);
                    //loop
                    foreach ($results as $user){
                        $userAccepted=$user["user"];
                        //Code for getting the profile image  
                        $profileQuery="select * from profile where email_id='$userAccepted'";
                        $profileResults=  mysqli_query($con, $profileQuery);
                        $row = mysqli_fetch_array($profileResults);
                        $acceptedPic=$row["picture"];
                        //////////////////////////////
                            ?>
                    <br>
                    <div class='heading' id='hide'>
                             <label class='name'></label>
        
                         <label class='hardcontent'> <?php echo $userAccepted; ?> Has posted...</label>
                                         <!--<label class='name'> <?//php echo $user["requestedSkill"] ?></label>-->
                    </div>
                    <div class='content' id=''<?php $id;?> >
                 
                        <table>
                        <tr><td><div style='width: 100px; height: 100px'><img src="<?php echo $acceptedPic ?>" alt="<?php echo $acceptedPic ?>" width='100' height='100'></div>
                            <td> <div class='details'><br><?php echo $user["title"];echo ("<br>"); echo $user["message"]; ?></div>

                        </tr>
                        </table>

                    </div>
                    
                    
                    <?php
                 $id++;
                    }; 
                    ?>

                    </div>



                </div><!--End of Feed-->

                <div id="rightboxes">
                    <div id="endorsements"><h4>Endorsements</h4></div>

                    <div id="ad2"><h4>Advertisements</h4></div>
                    </div>
            </div>
    
    <?php include('footer.php'); ?>

        
</div>


     </body>
</html>
