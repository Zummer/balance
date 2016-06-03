<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use app\models\Users;
use yii\helpers\ArrayHelper;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $transferForm \app\models\TransferForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('var change = function(event) {
                var el = $(event.target);
                var label = $("label[for=" + el.attr("id") + "]");
                if(el.val() == "1"){
                    label.text("Sum Validation Enabled");
                    label.css( "color", "black");
                }else if(el.val() == "0"){
                    label.text("Sum Validation Disabled");
                    label.css( "color", "red");
                }
            }');
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <p>
        <?= Html::a('Back to user view', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'balance',
        ],
    ]) ?>

    <?php
    // получаем всех авторов
    $users = Users::find()->where(['!=', 'id', $model->id])->all();
    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
    $items = ArrayHelper::map($users, 'id', 'name');
    $params = [
        'prompt' => 'Enter the user to transfer money'
    ]; ?>

    <?= $form->field($transferForm, 'user_to_id')->dropDownList($items, $params) ?>
    <?= $form->field($transferForm, 'sum')->textInput(['placeHolder' => 'Enter the sum in the currency format']) ?>

    <?= $form->field($transferForm, 'validation')->widget(CheckboxX::className(), [
//        'autoLabel' => true,
        'labelSettings' => [
            'label' => 'Sum Validation Enabled',
            'position' => CheckboxX::LABEL_RIGHT
        ],
        'pluginOptions' => [
            'threeState' => false,
            'size'=>'sm',
        ],
        'pluginEvents' => ['change' => 'change'],
    ])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Transfer', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>