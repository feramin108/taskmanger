<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Tasks Manager</title>
</head>
<body>
    <div id="app">
        <h1>Tasks Manager</h1>
        <form action="add_task.php" method="post">
            <input type="text" name="task" placeholder="Enter task..." required>
            <button type="submit">Add Task</button>
        </form>
        <table id="taskTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <!-- Task list will be dynamically populated here -->
            </tbody>
        </table>
    </div>

    <script>
        // Fetch tasks on page load
        $(document).ready(function() {
            fetchTasks();
        });

        // Function to fetch tasks using AJAX
        function fetchTasks() {
            $.ajax({
                url: 'get_tasks.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate tasks in the table
                    populateTasks(data);
                },
                error: function(error) {
                    console.log('Error fetching tasks:', error);
                }
            });
        }

        // Function to populate tasks in the table
        function populateTasks(tasks) {
            var tableBody = $('#taskTable tbody');
            tableBody.empty();

            tasks.forEach(function(task) {
                var row = '<tr>' +
                    '<td>' + task.id + '</td>' +
                    '<td>' + task.description + '</td>' +
                    '<td>' + task.created_at + '</td>' +
                    '</tr>';

                tableBody.append(row);
            });
        }
    </script>
</body>
</html>
