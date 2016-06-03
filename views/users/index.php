<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('User1', ['view', 'id' => 1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('User2', ['view', 'id' => 2], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('User3', ['view', 'id' => 3], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('User4', ['view', 'id' => 4], ['class' => 'btn btn-primary']) ?>
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
