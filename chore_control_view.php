<?php
// Include the function file
include 'chore_fxn.php';

// Call the function to get all chores
$chores_data = getAllChores();

// Display the list of chores
echo "<table>";
echo "<tr><th>Chore ID</th><th>Chore Name</th><th>Action</th></tr>";
foreach ($chores_data as $chore) {
    echo "<tr>";
    echo "<td>".$chore['cid']."</td>";
    echo "<td>".$chore['chorename']."</td>";
    echo "<td><a href='delete_chore_action.php?id=".$chore['cid']."'>Delete</a> | <a href='chore_control_view.php?id=".$chore['cid']."'>Edit</a></td>";
    echo "</tr>";
}
echo "</table>";
?>
