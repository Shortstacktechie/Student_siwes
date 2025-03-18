<?php
$servername = "localhost";
$username = "root"; // Change if using another DB user
$password = ""; // Change if you set a password
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$matric_number = $_POST['matric_number'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$program = $_POST['program'];
$level = $_POST['level'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO students (name, matric_number, email, phone, program, level) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $matric_number, $email, $phone, $program, $level);

// Execute
if ($stmt->execute()) {
    echo "<script>alert('Registration Successful!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
}

// Close connection
$stmt->close();
$conn->close();
?>
