<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 30.05.16
 * Time: 11:25
 */

namespace app\services;


use app\services\interfaces\TransactionInterface;

class Transaction implements TransactionInterface
{
    /**
     * @var \yii\db\Transaction
     */
    private $transaction;

    /**
     * Transaction constructor.
     * @param \yii\db\Transaction $transaction
     */
    public function __construct(\yii\db\Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function commit()
    {
        $this->transaction->commit();
    }
    public function rollback()
    {
        $this->transaction->rollBack();
    }

}