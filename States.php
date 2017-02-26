<?php
include_once 'DB_Con.php';

if(!empty(($_POST["cid"])))
{
    
    $cid=$_POST["cid"];
    $query="select * from states where Country_ID=$cid";
    $results=  mysqli_query($con, $query);

        foreach ($results as $states){
            ?>          
        <option value="<?php echo $states["State_ID"];?>"> <?php echo $states["State_Name"];?></option>
        <?php
        }
}
?>