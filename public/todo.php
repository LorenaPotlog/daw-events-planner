<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
</head>
<body>
<h1>To-Do List</h1>

<h2>Tasks:</h2>
<ul id="taskList">
    <li><input type="checkbox"> PLease add here</li>
</ul>

<h2>Done:</h2>
<ul id="doneList"></ul>

<!-- Form to Add Tasks -->
<h2>Add a Task:</h2>
<form id="taskForm">
    <label for="newTask">New Task:</label>
    <input type="text" id="newTaskInput" name="newTask">
    <button type="submit">Add</button>
</form>

<script>
    // Function to add a new task
    function addTask(event) {
        event.preventDefault(); // Prevent form submission

        // Get the input value
        const newTaskText = document.getElementById('newTaskInput').value;

        // Create a new list item
        const newTask = document.createElement('li');

        // Create a checkbox
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.addEventListener('change', moveTask); // Add change event listener

        // Append checkbox and task text to the new task
        newTask.appendChild(checkbox);
        newTask.appendChild(document.createTextNode(' ' + newTaskText));

        // Append the new task to the task list
        document.getElementById('taskList').appendChild(newTask);

        // Clear the input field after adding the task
        document.getElementById('newTaskInput').value = '';
    }

    // Function to move checked task to "Done"
    function moveTask() {
        const task = this.parentElement;
        if (this.checked) {
            task.remove(); // Remove task from the tasks list
            document.getElementById('doneList').appendChild(task); // Move task to "Done"
        } else {
            document.getElementById('taskList').appendChild(task); // Move back to tasks
        }
    }

    // Add an event listener to the form for submitting tasks
    document.getElementById('taskForm').addEventListener('submit', addTask);
</script>
</body>
</html>