<?php

namespace MVC\Models;

use MVC\Core\ResourceModelInterface;
use MVC\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _inni($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        try {
            $arrayModel = $model->getProperties();

            $id = $arrayModel['id'];

            $StringModel = "";
            foreach ($arrayModel as $key => $value) {
                $StringModel .= ($key . ' = :' . $key . ", ");
            }

            $StringModel = substr($StringModel, 0, -2);

            if ($arrayModel['id'] == null) {
                $sql = "INSERT INTO {$this->table} SET {$StringModel}";
            } else {
                $sql = "UPDATE {$this->table} SET {$StringModel} WHERE {$this->id} = {$id}";
            }

            $req = Database::getBdd()->prepare($sql);
            return $req->execute($arrayModel);
        } catch (\Exception $Exception) {
            // Note The Typecast To An Integer!
            throw new MyDatabaseException($Exception->getMessage(), (int)$Exception->getCode());
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->id} = {$id}";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id} = {$id}";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, get_class($this->model));
    }
} 