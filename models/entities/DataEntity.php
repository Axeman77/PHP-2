<?php

namespace app\models\entities;

use app\models\Model;

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