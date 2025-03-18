<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data
$sql = "SELECT * FROM students ORDER BY submitted_at DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Registered Students</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Matric Number</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Program</th>
            <th>Level</th>
            <th>Submitted At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['matric_number']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['program']; ?></td>
                <td><?php echo $row['level']; ?></td>
                <td><?php echo $row['submitted_at']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>
