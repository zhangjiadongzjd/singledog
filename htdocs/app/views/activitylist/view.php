<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activitylist */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Activitylists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activitylist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
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
            'ID',
            'Name',
            'Category',
            'Status',
            'StartTime',
            'EndTime',
            'Tag',
            [
                'attribute' => 'Logo',
                'format'=>['image',['width'=>'50%','height'=>'60%']],
                'value' => \yii\helpers\Url::to('@web/image/Activity/'.$model->Logo)
            ],
            'Desc:ntext',

        ],
    ]) ?>

</div>
