<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 02.06.16
 * Time: 17:25
 */
namespace app\services\interfaces;

interface NotifierInterface
{
    public function flash($type, $message);
}