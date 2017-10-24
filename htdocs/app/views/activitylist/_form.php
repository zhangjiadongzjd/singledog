<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget as Redactor;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Activitylist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activitylist-form">

    <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data' ]]); ?>

    <?php // $form->field($model, 'ID')->textInput() ?>
    <?= $form->field($model, 'Type')->dropDownList([ 'Banner' => 'Banner', 'List' => 'List', ]) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'Cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->dropDownList([ 'YES' => 'YES', 'NO' => 'NO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'StartTime')->textInput() ?>

    <?= $form->field($model, 'EndTime')->textInput() ?>

    <?= $form->field($model, 'Tag')->textInput(['maxlength' => true]) ?>

    <?php echo  $form->field($model, 'Logo')->fileInput() ?>

    <?php


    echo $form->field($model, 'Desc')->widget(Redactor::className(), [
//        'selector' => '#my-textarea-id',

        'settings' => [
            'lang' => 'zh_cn',
            'minHeight' => 200,
            'toolbarFixedTopOffset'=> 50 ,
            'imageUpload' => Url::to(['/activitylist/image-upload']),
//            'imageManagerJson' => \yii\helpers\Url::to(['/default/images-get']),
            'plugins' => [
                'clips',
                'fullscreen' ,
                'video',
                'textdirection',
                'table',
                'counter',
                'definedlinks',
                'fontsize',
                'limiter',
                'textexpander',
                'fontcolor',
                'imagemanager',
                'codemirror',
                'alignment'
//                'imagemanager'
            ]
        ],
//        'plugins' => [ 'my-custom-plugin' => 'app\assets\MyPluginBundle' ]
    ]);


    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
