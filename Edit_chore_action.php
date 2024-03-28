<?php
// Include the file that establishes the database connection
include 'connection.php'; 
$chorename = $_GET["choreName"];
$cid = $_GET["cid"];

$query="UPDATE Chores SET chorename ='$chorename' WHERE cid  = '$cid'";

if (mysqli_query($conn,$query)){

    header("Location:chores.php");
    exit();
}
else{
    echo"error:";
}

?>
