<?php
// Include database connection
include 'connection.php';

// Query to fetch data from the status table
$sql = "SELECT sid, sname FROM status";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Start the HTML select element
        echo '<select name="status" id="status">';
        
        // Output data of each row as options
        while($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row["sid"] . '">' . $row["sname"] . '</option>';
        }
        
        // Close the select element
        echo '</select>';
    } else {
        echo "No results found.";
    }
} else {
    // Print out any errors that occur during query execution
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
