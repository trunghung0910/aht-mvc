<?php

namespace MVC\Models;

use MVC\Core\Model;
use MVC\Config\Database;

class Student extends Model
{
    protected $name;
    protected $birthdate;
    protected $sex;
    protected $id;
    protected $created_at;
    protected $updated_at;

    public function __set($key, $value)
    {
        //kiểm tra xem trong class có tồn tại thuộc tính không
        if (property_exists($this, $key)) {
            //tiến hành gán giá trị
            $this->$key = $value;
        } else {
            die('Không tồn tại thuộc tính');
        }
    }

    public function __get($key)
    {
        //kiểm tra xem trong class có tồn tại thuộc tính không
        if (property_exists($this, $key)) {
            //tiến hành lấy giá trị
            return $this->$key;
        } else {
            die('Không tồn tại thuộc tính');
        }
    }

}

?>