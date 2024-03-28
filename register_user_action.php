<?php
// Include the connection file
include("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $familyRole = $_POST["familyRole"]; 
    $birthdate = $_POST["birthdate"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT); // encrypting the password

    // setting default role ID to 3
    $roleId = 3;

    // Writting INSERT query
    $sql = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // preparing and binding parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisssiiss", $roleId, $familyRole, $firstName, $lastName, $gender, $birthdate, $phoneNumber, $email, $encryptedPassword);

    // Executing the query
    if ($stmt->execute()) {
        // Redirecting to login_view page if execution is successful
        header("Location: login_view.php");
        exit();
    } else {
        // Displaying error on register_view page
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Closing statement
    $stmt->close();
}

// Closing connection
$conn->close();
?>
