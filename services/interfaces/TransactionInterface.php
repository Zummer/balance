<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 30.05.16
 * Time: 11:38
 */
namespace app\services\interfaces;

interface TransactionInterface
{
    public function commit();

    public function rollback();
}