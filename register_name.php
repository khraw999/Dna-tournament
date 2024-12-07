<?php
// Database connection details
$servername = "localhost:3307";
$username = "root";      // Use your MySQL username
$password = "";          // Use your MySQL password (empty if none)
$dbname = "register"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message variable
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $team = $_POST['team'];
    $lname = $_POST['lname'];
    $lid = $_POST['lid'];
    $lph = $_POST['lph'];
    $p1name = $_POST['p1name'];
    $p1id = $_POST['p1id'];
    $p2name = $_POST['p2name'];
    $p2id = $_POST['p2id'];
    $p3name = $_POST['p3name'];
    $p3id = $_POST['p3id'];
    $p4name = $_POST['p4name'];
    $p4id = $_POST['p4id'];
    $p5name = $_POST['p5name'];
    $p5id = $_POST['p5id'];

    // Insert data into the table
    $sql = "INSERT INTO teams (team, lname, lid, lph,
            p1name, p1id, 
            p2name, p2id, 
            p3name, p3id,            
            p4name, p4id,
            p5name, p5id) 
            VALUES ('$team', '$lname', '$lid', '$lph',
            '$p1name', '$p1id', 
            '$p2name', '$p2id',             
            '$p3name', '$p3id',
            '$p4name', '$p4id', 
            '$p5name', '$p5id')";

    if ($conn->query($sql) === TRUE) {
        $error_message = "New team registered successfully!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Registration</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the external CSS file -->
</head>
<body>

    <div class="container">
        <h1>Register a New Team</h1>
        <?php if ($error_message) { echo "<p class='".(strpos($error_message, 'Error') !== false ? 'error' : 'success')."'>$error_message</p>"; } ?>
       <form method="POST" action="">
    <div class="form-group">
        <label for="team">Team Name:</label>
        <input type="text" id="team" name="team" required>
    </div>
    <div class="form-group">
        <label for="lname">Leader Name:</label>
        <input type="text" id="lname" name="lname" required>
    </div>
    <div class="form-group">
        <label for="lid">Leader ID:</label>
        <input type="number" id="lid" name="lid" required>
    </div>
    <div class="form-group">
        <label for="lph">Leader Phone Number:</label>
        <input type="text" id="lph" name="lph" required>
    </div>

    <!-- Player 1 -->
    <div class="form-group">
        <label for="p1name">Player 1 Name:</label>
        <input type="text" id="p1name" name="p1name" required>
    </div>
    <div class="form-group">
        <label for="p1id">Player 1 ID:</label>
        <input type="number" id="p1id" name="p1id" required>
    </div>

    <!-- Player 2 -->
    <div class="form-group">
        <label for="p2name">Player 2 Name:</label>
        <input type="text" id="p2name" name="p2name" required>
    </div>
    <div class="form-group">
        <label for="p2id">Player 2 ID:</label>
        <input type="number" id="p2id" name="p2id" required>
    </div>

    <!-- Player 3 -->
    <div class="form-group">
        <label for="p3name">Player 3 Name:</label>
        <input type="text" id="p3name" name="p3name" required>
    </div>
    <div class="form-group">
        <label for="p3id">Player 3 ID:</label>
        <input type="number" id="p3id" name="p3id" required>
    </div>

    <!-- Player 4 -->
    <div class="form-group">
        <label for="p4name">Player 4 Name:</label>
        <input type="text" id="p4name" name="p4name" required>
    </div>
    <div class="form-group">
        <label for="p4id">Player 4 ID:</label>
        <input type="number" id="p4id" name="p4id" required>
    </div>

    <!-- Player 5 -->
    <div class="form-group">
        <label for="p5name">Player 5 Name:</label>
        <input type="text" id="p5name" name="p5name" required>
    </div>
    <div class="form-group">
        <label for="p5id">Player 5 ID:</label>
        <input type="number" id="p5id" name="p5id" required>
    </div>

    <div class="form-group">
        <input type="submit" value="Register Team">
    </div>
</form>

