<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Activitylist */

$this->title = 'Update Activitylist: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Activitylists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="activitylist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
