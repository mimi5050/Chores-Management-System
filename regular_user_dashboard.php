
<?php

include 'connection.php';

// Query to get the count of chores in progress
$sqlInProgress = "SELECT COUNT(*) AS count FROM assignment WHERE sid = 2";
$resultInProgress = mysqli_query($conn, $sqlInProgress);
$rowInProgress = mysqli_fetch_assoc($resultInProgress);
$countInProgress = $rowInProgress['count'];

// Query to get the count of incomplete chores
$sqlIncomplete = "SELECT COUNT(*) AS count FROM assignment WHERE sid = 4"; 
$resultIncomplete = mysqli_query($conn, $sqlIncomplete);
$rowIncomplete = mysqli_fetch_assoc($resultIncomplete);
$countIncomplete = $rowIncomplete['count'];

// Query to get the count of completed chores
$sqlCompleted = "SELECT COUNT(*) AS count FROM assignment WHERE sid = 3"; 
$resultCompleted = mysqli_query($conn, $sqlCompleted);
$rowCompleted = mysqli_fetch_assoc($resultCompleted);
$countCompleted = $rowCompleted['count'];

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regular User</title>
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
      margin-right: 10px;
    }

    .navbar a {
      padding: 15px;
      color: white;
      text-decoration: none;
      margin-bottom:30px;
    }

    .navbar a:hover {
      background-color: #2c6f6b;
    }


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
      cursor: pointer; 
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
      margin-left:-1000px;
      margin-top:200px;
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
      margin-top:10px;
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
            <p style="font-weight: bold; font-size: 20px;"><?php echo $countInProgress; ?></p>
        </div>

        <div class="chore-stat-container incomplete" onclick="redirectToChoreManagement()">
            <h3><i class="fas fa-exclamation-circle"></i> Incomplete</h3>
            <p style="font-weight: bold; font-size: 20px;"><?php echo $countIncomplete; ?></p>
        </div>

        <div class="chore-stat-container completed" onclick="redirectToChoreManagement()">
            <h3><i class="fas fa-check-circle"></i> Completed</h3>
            <p style="font-weight: bold; font-size: 20px;"><?php echo $countCompleted; ?></p>
        </div>
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
