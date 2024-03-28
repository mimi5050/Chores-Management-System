<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chores</title>
  <script src="https://kit.fontawesome.com/1b7b6b3da2.js" crossorigin="anonymous"></script>
  <style>
    /* Global Styles */
    body {
      background-color: white;
      color: black;
      font-family: Arial, sans-serif;
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

    /* Styles for the Chores Page */
    .chores-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(54, 137, 131, 0.5);
      margin-top: 50px;
    }

    .chores-container h2 {
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

    .form-group input {
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
    .dashboard-header {
      text-align: center;
      font-size: 24px;
      margin: 20px 0;
      color: white;
      background-color:#368983;
    }

    /* Styles for the delete and edit buttons */
    .table-actions button {
      padding: 8px 15px;
      margin-right: 10px;
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


    .overlay {
      display: none;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }


    .popup {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      color: black;
      max-width: 400px;
      width: 80%;
    }

    .popup label {
      display: block;
      margin-bottom: 10px;
      color: #368983;
      font-weight: bold;
    }

    .popup input[type="text"],
    .popup input[type="number"] {
      width: calc(100% - 20px);
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #368983;
      border-radius: 5px;
    }

    .popup button {
      width: calc(50% - 5px);
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #368983;
      color: white;
      cursor: pointer;
    }

    #cancel {
      margin-top :10px;
      background-color: #ff6666;
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

<div class="content">
    <div class="dashboard-header"><strong>Dashboard</strong></div>
    <div class="chores-container" id="chores-container">
        <h2>Chores</h2>
        <form action="add_chore_action.php" method="post" name="choreForm" id="choreForm">
            <div class="form-group">
                <label for="choreName">Chore Name:</label>
                <input type="text" id="choreName" name="choreName" placeholder="Enter chore name" required>
            </div>
            <div class="form-group">
                <button type="submit">Add Chore</button>
            </div>
        </form>
        <!-- Chore Table -->
        <table>
            <tr>
                <th>Chore ID</th>
                <th>Chore Name</th>
                <th>Actions</th>
            </tr>
            <?php
            // Include the function file
            include 'chore_fxn.php';

            // Call the function to get all chores
            $chores_data = getAllChores();

            // Display the list of chores
            foreach ($chores_data as $chore) {
                echo "<tr>";
                echo "<td>" . $chore['cid'] . "</td>";
                echo "<td>" . $chore['chorename'] . "</td>";
                echo "<td class='table-actions'><button><a href='delete_chore_action.php?id=" . $chore['cid'] . "'>delete</a></button> <button onclick='popUp(" . $chore['cid'] . ")'> Edit </button></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>
<script>
    function popUp(cid){
        var container = document.getElementById("chores-container");
        console.log(container);
        var popup = document.createElement("div");
        popup.classList.add("overlay");
        popup.style.display = "flex";
        popup.innerHTML =
            "<div class='popup'><form id='choreForm' action='Edit_chore_action.php' method ='get' name='cid'><label for='cid'>Chore ID:</label><input type='number' name='cid' value='"+cid+"' readonly><label for='choreName'>Update the chore name:</label><input type='text' id='choreName' name='choreName' placeholder='Enter the updated name' required><button>update</button></form><button id='cancel' onclick='closePopup()'>Cancel</button></div>";
        container.appendChild(popup);
    }

    function closePopup() {
        var popup = document.querySelector('.overlay');
        popup.parentNode.removeChild(popup); // Remove the popup element from the DOM
    }
</script>

</html>
