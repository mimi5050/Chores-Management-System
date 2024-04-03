<?php
// Include the connection file
require_once 'connection.php';

try {
    // SQL query to fetch only the names from the people table
    $sql = "SELECT fname, lname FROM people";
    // Execute the query
    $result = $conn->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Start the select element
        echo '<select name="peopleNames">';
        // Loop through the fetched data and display the names as options
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['fname'] . ' ' . $row['lname'] . '">' . $row['fname'] . ' ' . $row['lname'] . '</option>';
        }
        // End the select element
        echo '</select>';
    } else {
        echo "No records found";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn->close();
?>
