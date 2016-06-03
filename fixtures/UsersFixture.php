<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 03.06.16
 * Time: 11:26
 */

namespace app\fixtures;

use yii\test\ActiveFixture;

class UsersFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Users';
    public $dataFile = '@app/fixtures/data/users.php';
}