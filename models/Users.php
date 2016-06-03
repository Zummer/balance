<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $balance
 */
class Users extends ActiveRecord
{
    public function debit($sum)
    {
        $this->guardSumIsNull($sum);
        $this->guardEnoughBalance($sum);
        $this->balance -= $sum;
    }

    public function credit($sum)
    {
        $this->balance += $sum;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['balance'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'balance' => 'Balance',
        ];
    }

    /**
     * @param $sum
     * @throws \Exception
     */
    public function guardEnoughBalance($sum)
    {
        if ($sum > $this->balance) {
            throw new \Exception('Operation failed. You do not have enough balance.');
        }
    }

    /**
     * @param $sum
     * @throws \Exception
     */
    public function guardSumIsNull($sum)
    {
        if ($sum == null || $sum <= 0 || $sum == '0') {
            throw new \Exception('Operation failed. Sum is null.');
        }
    }
}
