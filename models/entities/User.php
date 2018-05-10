<?php
namespace app\models;

class User extends DataEntity
{
    public $id;
    public $login;
    public $password;
    public $email;
    public $first_name;
    public $last_name;

    public static function getTableName()
    {
        return "users";
    }

    public  function getFullName ()
    {
        return $this->first_name . " " . $this->last_name;
    }

}