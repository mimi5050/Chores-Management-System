<?php
// Include the database connection
include 'connection.php';

// Function to get all chores
function getAllChores() {
    global $conn;
    $result = [];

    // Query to select all chores
    $sql = "SELECT * FROM Chores";

    // Execute the query
    $query_result = $conn->query($sql);

    // Check if execution was successful
    if ($query_result) {
        // Check if any record was returned
        if ($query_result->num_rows > 0) {
            // Fetch records and assign to variable
            while ($row = $query_result->fetch_assoc()) {
                $result[] = $row;
            }
        }
    }

    // Return the result variable
    return $result;
}
?>
