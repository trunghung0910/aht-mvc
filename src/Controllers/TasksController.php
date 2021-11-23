<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TaskRepository;

class TasksController extends Controller
{
    private $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    function index()
    {
        $d['tasks'] = $this->taskRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $task = new Task();
            $task->title = $_POST['title'];
            $task->description = $_POST['description'];
            $task->created_at = date('Y-m-d H:i:s');

            if ($this->taskRepository->add($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create", 'defaults');
    }

    function edit($id)
    {
        $d["task"] = $this->taskRepository->get($id);

        if (isset($_POST["title"])) {
            $task = new Task();

            $task->title = $_POST['title'];
            $task->description = $_POST['description'];
            $task->updated_at = date('Y-m-d H:i:s');
            $task->id = $id;

            if ($this->taskRepository->add($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        if ($this->taskRepository->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}

?>