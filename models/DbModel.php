<?php

namespace app\models;

use app\interfaces\IDbModel;
use app\services\Db;

/**
 * Class DbModel
 * @package app\models
 */
abstract class DbModel extends Model implements IDbModel
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

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [':id' => $id], get_called_class());
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }

    public function insert()
    {
        $params = [];
        $columns = [];
        foreach ($this->properties as $key => $value) {
            if (in_array($key, static::getPersonalProperties())) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    public function update() {}

    public function save(){
        if($this->id){
            return $this->insert();
        }else{
            return $this->update();
        }
    }

    public static function getPersonalProperties()
    {
        return ['db', 'isNew'];
    }

}