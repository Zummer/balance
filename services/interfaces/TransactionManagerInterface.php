<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 30.05.16
 * Time: 11:34
 */
namespace app\services\interfaces;

use app\services\Transaction as Trans;

interface TransactionManagerInterface
{
    /**
     * @return Trans
     */
      public function begin();
}