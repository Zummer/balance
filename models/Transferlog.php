<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "transferlog".
 *
 * @property integer $id
 * @property integer $user_from_id
 * @property integer $user_to_id
 * @property string $sum
 * @property string $date
 */
class Transferlog extends ActiveRecord
{

    public static function create($fromId, $toId, $sum)
    {
        $transferlog = new self();
        $transferlog->user_from_id = $fromId;
        $transferlog->user_to_id = $toId;
        $transferlog->sum = $sum;
        $transferlog->date = date('Y-m-d H:i:s');

        return $transferlog;
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transferlog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_from', 'user_to', 'sum', 'date'], 'required'],
            [['user_from', 'user_to'], 'integer'],
            [['sum'], 'number'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_from' => 'User From',
            'user_to' => 'User To',
            'sum' => 'Sum',
            'date' => 'Date',
        ];
    }

    public function getUserFrom()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_from_id']);
    }

    public function getUserTo()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_to_id']);
    }
}
