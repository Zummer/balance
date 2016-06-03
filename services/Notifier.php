<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 28.05.16
 * Time: 17:01
 */

namespace app\services;

use app\services\interfaces\NotifierInterface;
use Yii;

class Notifier implements NotifierInterface
{
    public function flash($type, $message)
    {
        Yii::$app->session->setFlash($type, $message);
    }
}