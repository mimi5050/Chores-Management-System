<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <script src="https://kit.fontawesome.com/1b7b6b3da2.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: white;
      color: black;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
    }

    .navbar {
      background-color: #368983; 
      color: white; 
      min-width: 20%;
      padding: 0;
      margin: 0;
      overflow: hidden; 
      display: flex;
      flex-direction: column;
    }

    .navbar a {
      padding: 15px;
      color: white;
      text-decoration: none;
    }

    .navbar a:hover {
      background-color: #2c6f6b;
    }

    .settings-section {
      width: 80%;
      margin: auto;
      padding: 20px;
    }

    h2, h3 {
      color: #368983;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    select, input[type="text"], input[type="password"], input[type="time"], button {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      color: #333;
      margin-bottom: 15px;
    }

    button {
      background-color: #368983;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .dashboard-header {
      text-align: center;
      font-size: 24px;
      margin: 20px 0;
      color: white;
      background-color:#368983;
    }
    .logout-button {
      padding: 12px 20px;
      background-color: #368983;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      margin-top:300px;
    }

  </style>
</head>
<body>

<div class="navbar">
    <a style="font-size: 24px;"> <strong>Chore MS</strong> </a>
    <a href="home.php"><i class="fas fa-home"></i><strong> Home</strong></a>
    <a href="chores.php"><i class="fas fa-tasks"></i><strong> Chores</strong></a>
    <a href="manage_chores.php"><i class="fas fa-tasks"></i><strong> Manage Chores</strong></a>
    <a href="settings.php"><i class="fas fa-cogs"></i><strong> Settings</strong></a>
    <a href="logout.php" class="logout-button"><i class="fas fa-sign-out-alt"></i><strong> Logout</strong></a>
  </div>

  <div class="settings-section">
  <div class="dashboard-header"><strong>Dashboard</strong></div>
    <h2>Settings</h2>
    <div class="settings-option">
      <h3>Theme</h3>
      <label for="theme">Select Theme:</label>
      <select id="theme" name="theme">
        <option value="dark">Dark</option>
        <option value="light">Light</option>
      </select>
    </div>
    <div class="settings-option">
      <h3>Account</h3>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username">
    </div>
    <div class="settings-option">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password">
    </div>
    <div class="settings-option">
      <button type="button">Change Password</button>
    </div>
    <div class="settings-option">
      <h3>Privacy</h3>
      <label for="privacy-level">Privacy Level:</label>
      <select id="privacy-level" name="privacy-level">
        <option value="public">Public</option>
        <option value="private">Private</option>
      </select>
    </div>
  </div>
</body>
</html>
