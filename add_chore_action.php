<?php
// Include the file with database connection
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if choreName is set and not empty
    if (isset($_POST["choreName"]) && !empty($_POST["choreName"])) {
        // Retrieve choreName from the form
        $choreName = $_POST["choreName"];

        // Perform any necessary data sanitization/validation

        // Insert the chore into the database
        $sql = "INSERT INTO chores (chorename) VALUES ('$choreName')";

        if (mysqli_query($conn, $sql)) {
            // Chore added successfully
            // Redirect back to the chores page or show a success message
            // Redirect back to the chores page with the "chores" section specified
        header("Location:chores.php");
        exit();

        } else {
            // Error occurred while adding chore to the database
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        // Chore name not provided
        echo "Chore name is required";
    }
} else {
    // Redirect back to the chores page if accessed directly without submitting the form
    // Redirect back to the chores page with the "chores" section specified
    header("Location:chores.php");
    exit();

}
?>
