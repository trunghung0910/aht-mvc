<?php

namespace MVC\Models;


class StudentRepository
{
    private $studentResourceModel;

    public function __construct()
    {
        $this->studentResourceModel = new StudentResourceModel();
    }

    public function add($model)
    {
        return $this->studentResourceModel->save($model);
    }

    public function get($id)
    {
        return $this->studentResourceModel->getById($id);
    }

    public function delete($model)
    {
        return $this->studentResourceModel->delete($model);
    }

    public function getAll()
    {
        return $this->studentResourceModel->getAll();
    }
}