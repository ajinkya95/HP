<?php
include_once 'DB_Con.php';
session_start();
echo '<script type=text/javascript> GetSkills </script>';
    $chkArray = json_decode(stripslashes(filter_input(INPUT_POST, 'jsonString')));
    $loggedUser=$_SESSION["loggedUser"];
    $query="Insert into users_skills(email,skill1,skill2,skill3,skill4,skill5,skill6,skill7,skill8,skill9,skill10,skill11,skill12,skill13,skill14,skill15)"
            . " values ('$loggedUser','$chkArray[0]','$chkArray[1]','$chkArray[2]','$chkArray[3]','$chkArray[4]','$chkArray[5]','$chkArray[6]','$chkArray[7]','$chkArray[8]','$chkArray[9]','$chkArray[10]','$chkArray[11]','$chkArray[12]','$chkArray[13]','$chkArray[14]')";
    mysqli_query($con, $query);

?>