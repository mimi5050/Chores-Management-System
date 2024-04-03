<?php
// Include the connection file
include("connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST["username"];
    $password = $_POST["password"];

    // Query to fetch user data based on email
    $sql = "SELECT * FROM People WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['passwd'])) {
            // Password is correct, start session and redirect based on role
            
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $user['pid'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['rid'];
            $_SESSION['family_role'] = $user['fid'];
            
           
            
            if ($user['fid'] == 2 || $user['fid'] == 1) {
                header("Location: admin_dashboard.php");
                exit();
            } else {
                header("Location: regular_user_dashboard.php");
                exit();
            }
            
        } else {
            // Incorrect password
            session_start();
            $_SESSION['error_message'] = "Incorrect email or password.";
            header("Location: login_view.php");
            exit();
        }
    } else {
        // User not found
        session_start();
        $_SESSION['error_message'] = "User not found.";
        header("Location: login_view.php");
        exit();
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
