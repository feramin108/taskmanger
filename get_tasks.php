<!-- get_tasks.php -->
<?php
$conn = new mysqli("localhost", "root", "", "task_manager");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

$tasks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($tasks);
?>

