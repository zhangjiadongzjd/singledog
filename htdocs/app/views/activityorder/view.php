<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activityorder */

$this->title = $model->OrderID;
$this->params['breadcrumbs'][] = ['label' => 'Activityorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activityorder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->OrderID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->OrderID], [
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
            'OrderID',
            [
                'label'=>'User',
                'value'=> $model->user->nickname
            ],
            [
                'label'=>'Activity',
                'value'=> $model->activity->Name
            ],
            'PayStatus',
            'AddTime',
        ],
    ]) ?>

</div>
