<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout Page</title>
  <style>
    body {
      background-image: url('Images/slide2.jpg');
      color: black;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .logout-container {
      text-align: center;
    }

    .logout-message {
      font-size: 24px;
      color: white;
      margin-bottom: 20px;
      background-color: rgba(54, 137, 131, 0.5);
    }

    .login-button {
      padding: 12px 20px;
      background-color: #368983;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }
  </style>
</head>

<body>
  <div class="logout-container">
    <p class="logout-message"><strong>You have successfully logged out. If you want to come back again login here!</strong></p>
    <a href="login_view.php" class="login-button">Login</a>
  </div>
</body>

</html>
