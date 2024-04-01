<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://kit.fontawesome.com/1b7b6b3da2.js" crossorigin="anonymous"></script>
  <style>
    /* Common Styles */

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
      margin-right: 10px;
    }

    .navbar a {
      padding: 15px;
      color: white;
      text-decoration: none;
    }

    .navbar a:hover {
      background-color: #2c6f6b;
    }

    /* Dashboard Styles */

    .right-section {
      width: 100%;
      background-color: white;
      margin-right: 20px;
    }

    .dashboard-header {
      text-align: center;
      font-size: 24px;
      margin: 20px 0;
      color: white;
      background-color:#368983
      
    }


    .dashboard-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .chore-stat-container {
      flex: 0 0 calc(33.33% - 25px);
      padding: 10px;
      border: 2px solid #368983;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(54, 137, 131, 0.5);
      cursor: pointer; /* Added cursor */
    }

    .chore-stat-container h3 {
      margin-top: 0;
    }

    .chore-history-container {
      width: 100%;
      padding: 15px;
      border: 2px solid #368983;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(54, 137, 131, 0.5);
      margin-top: 25px;
    }

    .chore-entry {
      margin-top: 30px;
      padding: 20px;
      border: 2px solid #368983;
      border-radius: 10px;
      background-color: white;
      color: black;
      box-shadow: 0 0 10px rgba(54, 137, 131, 0.5);
    }

    .chore-details {
      margin-top: 18px;
    }

    .logout-container {
      position: absolute;
      top: 10px;
      right: 10px;
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
    <a href="regular_user_dashboard.php"><i class="fas fa-home"></i><strong> Home</strong></a>
    <a href="user_chores.php"><i class="fas fa-tasks"></i><strong> Chores</strong></a>
    <a href="user_settings.php"><i class="fas fa-cogs"></i><strong> Settings</strong></a>
    <a href="logout.php" class="logout-button"><i class="fas fa-sign-out-alt"></i><strong> Logout</strong></a>
  </div>

  <div class="right-section">
    <div class="dashboard-header"><strong>Dashboard</strong></div>

    <div class="dashboard-container">
      <div class="chore-stat-container in-progress" onclick="redirectToChoreManagement()">
        <h3><i class="fas fa-spinner"></i> In Progress</h3>
        <p style="font-weight: bold; font-size: 20px;">4</p>
      </div>

      <div class="chore-stat-container incomplete" onclick="redirectToChoreManagement()">
        <h3><i class="fas fa-exclamation-circle"></i> Incomplete</h3>
        <p style="font-weight: bold; font-size: 20px;">14</p>
      </div>

      <div class="chore-stat-container completed" onclick="redirectToChoreManagement()">
        <h3><i class="fas fa-check-circle"></i> Completed</h3>
        <p style="font-weight: bold; font-size: 20px;">18</p>
      </div>
    </div>

    <div class="chore-history-container">
      <h2 style="text-align: center;">Chore History</h2>

      <div class="chore-entry">
        <div class="chore-details">
          <p>Assigned to: Father | Assigned Date: 2024-01-25</p>
          <p>Chore: Laundry</p>
        </div>
      </div>

      <div class="chore-entry">
        <div class="chore-details">
          <p>Assigned to: Mother | Assigned Date: 2024-01-24</p>
          <p>Chore: Cooking</p>
        </div>
      </div>

      <div class="chore-entry">
        <div class="chore-details">
          <p>Assigned to: Son | Assigned Date: 2024-01-23</p>
          <p>Chore: Cleaning</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function redirectToChoreManagement() {
        window.location.href = "manage_chores.php";
      }
  </script>
</body>

</html>
