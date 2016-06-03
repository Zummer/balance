<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 28.05.16
 * Time: 16:47
 */

namespace app\services;

use app\models\Transferlog;
use app\services\interfaces\LoggerInterface;

class Logger implements LoggerInterface
{
    public function log($fromId, $toId, $sum)
    {
        /** @var  Transferlog $transferlog */
        $transferlog = Transferlog::create($fromId, $toId, $sum);
        $transferlog->save(false);
    }
}