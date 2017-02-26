<?php
$con=mysqli_connect("localhost", "root", "", "halfpace");
if(mysqli_connect_errno()){
    echo 'Failed to connect '.  mysqli_errorno();
}

    //fetch table rows from mysql db
    $sql = "select * from skillset";
    $result = mysqli_query($con, $sql) or die("Error in Selecting " . mysqli_error($connection));

     //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

?>
