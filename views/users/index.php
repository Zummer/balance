<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$users = \yii\helpers\ArrayHelper::map($dataProvider->getModels(), 'id', 'name');
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php foreach ($users as $index => $name) {
            echo Html::a($name, ['view', 'id' => $index], [
                'class' => 'btn btn-primary',
                'style' => ['margin' => '5px']
            ]);
        } ?>
        <?= Html::a('Create new user', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'balance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
