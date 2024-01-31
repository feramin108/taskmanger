<!-- add_task.php -->
<?php
$conn = new mysqli("db", "root", "", "task_manager");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$task = $_POST['task'];

$sql = "INSERT INTO tasks (description) VALUES ('$task')";
$conn->query($sql);

$conn->close();

header("Location: index.php");
exit();
?>

<!-- get_tasks.php -->
<?php
$conn = new mysqli("db", "root", "", "task_manager");

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

echo json_encode($tasks);
?>

<!-- delete_task.php -->
<?php
$conn = new mysqli("db", "root", "", "task_manager");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$taskId = $_POST['taskId'];

$sql = "DELETE FROM tasks WHERE id = $taskId";
$conn->query($sql);

$conn->close();

header("Location: index.php");
exit();
?>
