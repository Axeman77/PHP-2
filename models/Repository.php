<?php
namespace app\models;
use app\services\Db;

abstract class Repository
{
    /** @var  Db */
    protected $_db;

    /**
     * Product constructor.
     * @param $db
     */
    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], $this->getEntityClass());
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $entity->id]);
    }

    public function insert(DataEntity $entity)
    {
        $params = [];
        $columns = [];
        foreach ($entity as $key => $value) {
            /*if (in_array($key, static::getPersonalProperties())) {
                continue;
            }*/

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    public function save(DataEntity $entity){
        if($entity->id){
            return $this->insert($entity);
        }else{
            return $this->update($entity);
        }
    }


    public function update() {}

    abstract public function getTableName();

    abstract public function getEntityClass();
}