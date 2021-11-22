<?php

namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Student;
use MVC\Models\StudentRepository;

class StudentsController extends Controller
{
    private $studentRepository;

    public function __construct()
    {
        $this->studentRepository = new StudentRepository();
    }

    function index()
    {
        $students = new Student();

        $d['students'] = $this->studentRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["name"])) {
            $students = new Student();
            $students->name = $_POST['name'];
            $students->birthdate = $_POST['birthdate'];
            $students->sex = $_POST['sex'];
            $students->created_at = date('Y-m-d H:i:s');

            if ($this->studentRepository->add($students)) {
                header("Location: " . WEBROOT . "students/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $student = new Student();

        $d["student"] = $this->studentRepository->get($id);

        if (isset($_POST["name"])) {
            $student->name = $_POST['name'];
            $student->birthdate = $_POST['birthdate'];
            $student->sex = $_POST['sex'];
            $student->updated_at = date('Y-m-d H:i:s');
            $student->id = $id;

            if ($this->studentRepository->add($student)) {
                header("Location: " . WEBROOT . "students/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $student = new Student();
        if ($this->studentRepository->delete($id)) {
            header("Location: " . WEBROOT . "students/index");
        }
    }
}

?>