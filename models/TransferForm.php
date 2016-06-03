<?php

namespace app\models;

use Yii;
use yii\base\Model;

class TransferForm extends Model
{
    const VALIDATION_DISABLED = 0;
    const VALIDATION_ENABLED = 1;

    public $user_from_id;
    public $user_to_id;
    public $sum;
    public $date;
    public $validation;

    const WHEN_CLIENT = "function(attribute, value) {
                    return $('#transferform-validation').val() == '" . self::VALIDATION_ENABLED . "';
                }";

    public function __construct($fromId, $config = [])
    {
        $this->user_from_id = $fromId;
        parent::__construct($config);
    }

    public function init()
    {
        $this->date = date('Y-m-d');
        $this->validation = self::VALIDATION_ENABLED;
    }

    public function getBalance($id)
    {
        /** @var Users $userFrom */
        $userFrom = Users::findOne($id);
        return (double)$userFrom->balance;
    }

    public function checkValidation()
    {
        return function (self $model) {
            return $model->validation == self::VALIDATION_ENABLED;
        };
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_from_id', 'user_to_id', 'sum', 'date'], 'required'],
            [['sum'], 'number'],
            ['sum', 'compare', 'compareValue' => 0, 'operator' => '>',
                'when' => $this->checkValidation(), 'whenClient' => self::WHEN_CLIENT],
            ['sum', 'compare', 'compareValue' => $this->getBalance($this->user_from_id), 'operator' => '<=',
                'when' => $this->checkValidation(), 'whenClient' => self::WHEN_CLIENT],
            [['validation'], 'boolean'],
//            ['validation', 'compare', 'compareValue' => 4, 'operator' => '==']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_from_id' => 'User From ID',
            'user_to_id' => 'User To ID',
            'date' => 'Date',
            'sum' => 'Sum',
            'validation' => 'Enabled Sum Validation',
        ];
    }
}
