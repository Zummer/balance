<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 03.06.16
 * Time: 11:26
 */

namespace app\fixtures;

use yii\test\ActiveFixture;

class TransferlogFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Transferlog';
    public $dataFile = '@app/fixtures/data/transferlog.php';
}