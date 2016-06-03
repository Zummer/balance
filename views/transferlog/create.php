<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Transferlog */

$this->title = 'Create Transferlog';
$this->params['breadcrumbs'][] = ['label' => 'Transferlogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferlog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
