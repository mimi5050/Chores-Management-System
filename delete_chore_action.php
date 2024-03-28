<?php
// Include the database connection
include 'connection.php';

    $chore_id = $_GET['id'];

    // Write the DELETE query (use prepared statements to prevent SQL injection)
    $sql = "DELETE FROM Chores WHERE cid = $chore_id";

    $query = mysqli_query($conn,$sql);

    if($query){

        header("Location:chores.php");
    }
     else{
       echo "error".mysqli_error($conn);
     }
?>
