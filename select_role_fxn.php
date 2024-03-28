<?php
// Includeing the connection file
include_once 'connection.php';

// Selecting query on the "Family_name" table
$sql = "SELECT * FROM Family_name";

// Executing the query using the connection
$result = $conn->query($sql);

// Checking if execution worked
if ($result === false) {
    echo "Error executing query: " . $conn->error;
} else {
    // Fetching the results and building the family role dropdown
    echo '<select id="familyRole" name="familyRole" required>';
    echo '<option value="0" disabled>Select</option>';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['fid'] . '">' . $row['fam_name'] . '</option>';
    }
    echo '</select>';
}

// Closing the connection
$conn->close();
?>
