<?php
namespace app\models;

class User extends DataEntity
{
    public $id;
    public $login;
    public $password;

    public static function getTableName()
    {
        return "users";
    }
}