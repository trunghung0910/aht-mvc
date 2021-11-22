<?php

namespace MVC\Models;

use MVC\Core\ResourceModelInterface;

class StudentResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_inni("students", "id", new Student());
    }
}