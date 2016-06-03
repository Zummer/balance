<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 03.06.16
 * Time: 2:47
 */
namespace app\services\interfaces;

interface LoggerInterface
{
    public function log($fromId, $toId, $sum);
}