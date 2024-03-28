<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    body {
      background-color: white;
      color: black;
      font-family: Arial, sans-serif;
      background-image: url('Images/slide5.jpg');
      background-attachment: fixed;
    }

    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(54, 137, 131, 0.5);
      margin-top: 150px;
    }

    .login-container h2 {
      color: #368983;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #368983;
    }

    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #368983;
      border-radius: 5px;
      background-color: white;
      color: black;
    }

    .form-group select {
      width: 100%;
      padding: 8px;
      border: 1px solid #368983;
      border-radius: 5px;
      background-color: white;
      color: black;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #368983;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="login_user_action.php" method="post" name="loginForm" id="loginForm">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <button type="submit" name="login_button">Login</button>
      </div>
    </form>
    <p id="error_message" style="color: red;"><?php if(isset($_SESSION['error_message'])) { echo $_SESSION['error_message']; unset($_SESSION['error_message']); } ?></p>
    <p>Don't have an account? <a href="register_view.php">Register here</a></p>
  </div>
</body>
</html>
