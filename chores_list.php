<?php
include 'connection.php'; // Include your connection file

if ($conn) {
    // Query to fetch chores from the database
    $sql = "SELECT cid, chorename FROM chores";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if(mysqli_num_rows($result) > 0) {
            echo '<select id="assignChore" name="assignChore" required>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row['cid'].'">'.$row['chorename'].'</option>';
            }
            echo '</select>';
        } else {
            echo 'No chores found.';
        }
    } else {
        echo 'Error executing query: ' . mysqli_error($conn);
    }

    mysqli_close($conn); // Close the database connection
} else {
    echo 'Error connecting to the database.';
}
?>
