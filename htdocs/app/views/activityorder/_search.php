<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivityorderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activityorder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'OrderID') ?>

    <?= $form->field($model, 'UserID') ?>

    <?= $form->field($model, 'ActivityID') ?>

    <?= $form->field($model, 'PayStatus') ?>

    <?= $form->field($model, 'AddTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
