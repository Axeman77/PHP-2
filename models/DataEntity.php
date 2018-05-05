<?php

namespace app\models;

use app\interfaces\IDbModel;
use app\services\Db;

/**
 * Class DataEntity
 * @package app\models
 */
abstract class DataEntity extends Model
{
    public static function getPersonalProperties()
    {
        return ['isNew'];
    }
}