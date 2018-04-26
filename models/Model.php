<?php

namespace app\models;

use app\services\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    // Удаляет товар с указанным id
    public function deleteProductById($id)
    {
        $tableName = $this->getTableName();
        // Текст запроса к БД
        $sql = "DELETE FROM {$tableName} WHERE id = {$id}";
        // Получение и возврат результатов
        return $this->db->execute($sql);
    }

    // Редактирует товар с заданным id

    public function updateProductById($id, $price)
    {
        $tableName = $this->getTableName();
        // Текст запроса к БД
        $sql = "UPDATE {$tableName} SET price = {$price} WHERE id = {$id}";
        // Получение и возврат результатов
        return $this->db->queryOne($sql);
    }

    // Добавляет новый товар

    public function createProduct($id,$name,$discription,$price)
    {
        $tableName = $this->getTableName();
        // Текст запроса к БД
        $sql = "INSERT INTO {$tableName} ('id','name','discription','price') VALUES ({$id},{$name},{$discription},{$price})";
        // Получение и возврат результатов
        return $this->db->execute($sql, [$id,$name,$discription,$price]);
    }
}