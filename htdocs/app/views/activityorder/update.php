<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activityorder */

$this->title = 'Update Activityorder: ' . $model->OrderID;
$this->params['breadcrumbs'][] = ['label' => 'Activityorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->OrderID, 'url' => ['view', 'id' => $model->OrderID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activityorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
