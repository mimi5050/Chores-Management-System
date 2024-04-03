<?php
include("connection.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_view.php?error=you are not logged in");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['assignChoreBtn'])) {
    $assignPerson = $_POST['assignPerson'];
    $assignChore = $_POST['assignChore'];
    $dueDate = $_POST['dueDate'];
    $whoAssigned = $_SESSION['user_id']; 

    // Insert into Assignment table
    $insertAssignmentQuery = "INSERT INTO Assignment (cid, sid, date_assign, date_due, who_assigned) 
                              VALUES (?, 1, NOW(), ?, ?)";
    $stmt = $conn->prepare($insertAssignmentQuery);
    $stmt->bind_param("iss", $assignChore, $dueDate, $whoAssigned);
    if ($stmt->execute()) {
        $assignmentId = $stmt->insert_id;

        // Insert into Assigned_people table
        $insertAssignedPeopleQuery = "INSERT INTO Assigned_people (pid, assignmentid) VALUES (?, ?)";
        $stmt = $conn->prepare($insertAssignedPeopleQuery);
        $stmt->bind_param("ii", $assignPerson, $assignmentId);
        if ($stmt->execute()) {
            // Chore assigned successfully
            header("Location: chores_assignment.php");
            exit();
        } else {
            // Error inserting into Assigned_people table
            echo "Error: " . $conn->error;
        }
    } else {
        // Error inserting into Assignment table
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
