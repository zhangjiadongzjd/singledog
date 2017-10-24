<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitylistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Activitylists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activitylist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'Type',
            'Name',
//            'Category',
            'Status',
            'StartTime',
             'EndTime',
            // 'Tag',
            // 'Logo',
            // 'Desc:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view}'
            ],
        ],
    ]); ?>
</div>
