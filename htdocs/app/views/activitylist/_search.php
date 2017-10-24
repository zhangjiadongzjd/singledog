<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActivitylistSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activitylist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Category') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'StartTime') ?>

    <?php // echo $form->field($model, 'EndTime') ?>

    <?php // echo $form->field($model, 'Tag') ?>

    <?php // echo $form->field($model, 'Logo') ?>

    <?php // echo $form->field($model, 'Desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
