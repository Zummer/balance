<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Create comment', ['comment-create', 'id' => $model->id], [
            'class' => 'btn btn-primary',
            'data' => [
                'method' => 'post',

            ]
        ]) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'balance',
        ],
    ]) ?>
    <p>

        <?php if ($model->balance > 0): ?>
            <?= Html::a('Create transfer', ['transfer-create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php else: ?>
            <?= Html::a('Create transfer', ['transfer-create', 'id' => $model->id], ['class' => 'btn btn-success', 'disabled' => 'disabled']) ?>
        <?php endif; ?>
</div>
