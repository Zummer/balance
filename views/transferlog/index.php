<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransferlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transferlogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferlog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_from_id' => [
                'attribute' => 'user_from_id',
                'value' => 'userFrom.name',
            ],
            'user_to_id'=> [
                'attribute' => 'user_to_id',
                'value' => 'userTo.name',
            ],
            'sum',
            'date' => [
                'attribute' => 'date',
                'format' => ['date', 'php:Y-m-d H:i:s']
            ],

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
