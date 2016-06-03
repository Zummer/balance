<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $text
 */
class Comments extends ActiveRecord
{
    public function __construct($id = null, $config = [])
    {
        $this->user_id = $id;
        parent::__construct($config);
    }


    public function init()
    {
        /** @var Users $user */
        $user = Users::findOne($this->user_id);
        if ($user) {
            $this->text = 'Comment by: ' . $user->name;
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'text'], 'required'],
            [['user_id'], 'integer'],
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
        ];
    }
}
