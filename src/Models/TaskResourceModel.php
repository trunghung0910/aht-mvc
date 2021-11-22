<?php

namespace MVC\Models;

use MVC\Core\ResourceModelInterface;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_inni("tasks", "id", new Task());
    }
}