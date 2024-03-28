<?php
// Starting session
session_start();

// Including connection file
include_once 'connection.php';

// Checking if login button was clicked
if(!isset($_POST['login_button'])) {
    // Stopping processing and providing appropriate message or redirection
    header("Location: login_view.php"); // this redirects to login page if the user did not click login button
    exit();
}

// Collecting form data and store in variables
$email = $_POST['username']; 
$password = $_POST['password'];

// Writing  a query to SELECT a record from the People table using the email
$sql = "SELECT * FROM People WHERE email = ?";

// Preparing statement
$stmt = $conn->prepare($sql);

if (!$stmt) {
    // Error handling for query preparation failure
    $_SESSION['error_message'] = "Database error: " . $conn->error; 
    header("Location: login_view.php"); 
    exit();
}

// Bind parameters
$stmt->bind_param("s", $email);

// Execute the query
if (!$stmt->execute()) {
    // Error handling for query execution failure
    $_SESSION['error_message'] = "Database error: " . $stmt->error; 
    header("Location: login_view.php"); 
    exit();
}

// Get result
$result = $stmt->get_result();

// Check if any row was returned
if($result->num_rows == 0) {
    // No record found, provide appropriate response
    $_SESSION['error_message'] = "Incorrect username or password"; 
    header("Location: login_view.php");
    exit();
}

// Fetch the record
$user = $result->fetch_assoc();

// Verify password using password_verify
if(!password_verify($password, $user['passwd'])) {
    // Password verification fails, provide appropriate response
    $_SESSION['error_message'] = "Incorrect username or password"; 
    header("Location: login_view.php"); 
    exit();
}

// Clear any previous error message
unset($_SESSION['error_message']);

// Create session for user id and role id
$_SESSION['user_id'] = $user['pid']; 
$_SESSION['role_id'] = $user['rid']; 

// Redirect to home page
header("Location: home.php");
exit();
?>
