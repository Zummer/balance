<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 30.05.16
 * Time: 11:24
 */

namespace app\services;


use app\services\interfaces\TransactionManagerInterface;
use app\services\Transaction as Trans;

class TransactionManager implements TransactionManagerInterface
{
    public function begin()
    {
        return new Trans(\Yii::$app->db->beginTransaction());
    }
}