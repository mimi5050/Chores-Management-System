<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chores Assignment</title>
  <script src="https://kit.fontawesome.com/1b7b6b3da2.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: white;
      color: black;
      font-family: Arial, sans-serif;
      background-image: url('Images/slide5.jpg');
      background-attachment: fixed;
      margin: 0;
      padding: 0;
      display: flex;
    }

    /* Navigation Styles */
    .navbar {
      background-color: #368983;
      color: white;
      width: 20%; /* Occupies 20% of the container */
      padding: 0;
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

    /* Content Styles */
    .content {
      width: 75%; /* Occupies 75% of the container */
      padding: 20px;
    }

    /* Styles for the Assign Chore Page */
    .assignment-container {
      max-width: 80%;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(54, 137, 131, 0.5);
      margin-top: 50px;
    }

    .assignment-container h2 {
      color: #368983;
      text-align: center;
      background-color: rgba(54, 137, 131, 0.5);
      padding: 10px;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #368983;
    }

    .form-group select,
    .form-group input[type="date"] {
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
      margin-top: 5px;
      border: none;
      border-radius: 5px;
      background-color: #368983;
      color: white;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #368983;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #368983;
      color: white;
    }

    /* Add spacing between buttons in table actions */
    .table-actions button {
      margin-right: 5px;
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
    <a href="chores_assignment.php"><i class="fas fa-tasks"></i><strong> Chores Assignment</strong></a>
    <a href="manage_chores.php"><i class="fas fa-tasks"></i><strong> Manage Chores</strong></a>
    <a href="settings.php"><i class="fas fa-cogs"></i><strong> Settings</strong></a>
    <a href="logout.php" class="logout-button"><i class="fas fa-sign-out-alt"></i><strong> Logout</strong></a>
</div>

<div class="content">
    <div class="dashboard-header"><strong>Dashboard</strong></div>
    <div class="assignment-container">
        <h2>Assign Chore</h2>
        <form action="assign_chore_action.php" method="post" name="assignmentForm" id="assignmentForm">

            <div class="form-group">
                <label for="assignPerson">Assign Person:</label>
                <!-- Include PHP code to fetch user list -->
                <?php include 'select_role_fxn.php'; ?>
            </div>
            <div class="form-group">
                <label for="assignChore">Assign Chore:</label>
                <!-- Include PHP code to fetch chore list -->
                <?php include 'chores_list.php'; ?> 
            </div>
            <div class="form-group">
                <label for="chorestatus">Choose Chore Status:</label>
                <!-- Include PHP code to fetch chore list -->
                <?php include 'chore_status_list.php'; ?> 
            </div>
            <div class="form-group">
                <label for="dueDate">Due Date:</label>
                <input type="date" id="dueDate" name="date_due" required>
            </div>
            
            <div class="form-group">
                <input type="hidden" name="date_assign" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="last_updated" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <input type="hidden" name="who_assigned" value="1"> <!-- Assuming 1 is the ID of the user assigning chores -->
                <button type="submit">Assign Chore</button>
            </div>
        </form>

        <!-- Table to display assigned chores -->
        <table>
        <tr>
          <th>Chore Name</th>
          <th>Person Assigned</th>
          <th>Date Assigned</th>
          <th>Due Date</th>
          <th>Chore Status</th>
          <th>Actions</th>
        </tr>
        <!-- Include PHP code to fetch and display assigned chores -->
        <?php
        // Include database connection
        include 'connection.php';

        // Query to fetch assigned chores
        $sql = "SELECT assignmentid, c.chore_name, u.username, date_assign, date_due, chore_status
                FROM assignment a
                INNER JOIN chores c ON a.cid = c.cid
                INNER JOIN people u ON a.sid = u.sid";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful
        if ($result) {
            // Check if there are any assigned chores
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row["chore_name"]."</td>";
                    echo "<td>".$row["username"]."</td>";
                    echo "<td>".$row["date_assign"]."</td>";
                    echo "<td>".$row["date_due"]."</td>";
                    echo "<td>".$row["chore_status"]."</td>";
                    echo "<td class='table-actions'>";
                    echo "<button>Edit</button>";
                    echo "<button>Complete</button>";
                    echo "<button>Incomplete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No assigned chores found.</td></tr>";
            }
        } else {
            // Print out any errors that occur during query execution
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
        ?>

      </table>
    </div>
</div>

</body>

</html>
