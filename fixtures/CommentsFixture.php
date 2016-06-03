<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 03.06.16
 * Time: 11:26
 */

namespace app\fixtures;

use yii\test\ActiveFixture;

class CommentsFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Comments';
    public $dataFile = '@app/fixtures/data/comments.php';
}