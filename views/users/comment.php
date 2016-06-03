<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = 'Create Comments';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['disabled' => $model->user_id]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
