<!-- activities.php -->
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

