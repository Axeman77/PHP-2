<?php


namespace app\models\repositories;
use app\models\Product;
use app\models\Repository;
use app\models\User;

class UsersRepository extends Repository
{
    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass()
    {
        return User::class;
    }

    public function getFoggotenUsers()
    {

    }

}