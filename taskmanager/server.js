// server.js
const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

const app = express();
const PORT = 3000;

mongoose.connect('mongodb://localhost:27017/taskmanager', { useNewUrlParser: true, useUnifiedTopology: true });

const Task = mongoose.model('Task', { description: String });

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

app.post('/add-task', async (req, res) => {
    const { task } = req.body;
    const newTask = new Task({ description: task });
    await newTask.save();
    res.redirect('/');
});

app.get('/get-tasks', async (req, res) => {
    const tasks = await Task.find();
    res.send(tasks);
});

app.post('/delete-task', async (req, res) => {
    const { taskId } = req.body;
    await Task.findByIdAndDelete(taskId);
    res.redirect('/');
});

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
