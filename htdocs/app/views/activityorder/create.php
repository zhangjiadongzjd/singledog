<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Activityorder */

$this->title = 'Create Activityorder';
$this->params['breadcrumbs'][] = ['label' => 'Activityorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activityorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
