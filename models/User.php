<?php
namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $password;

    public function getTableName()
    {
        return "users";
    }
}