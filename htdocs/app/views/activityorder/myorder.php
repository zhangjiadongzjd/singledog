<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '我的订单';
$this->registerCssFile('@web/css/index.css',['depends'=>['app\assets\AppAssetAO']]);
$this->registerCssFile('@web/css/global.css',['depends'=>['app\assets\AppAssetAO']]);
$this->registerCssFile('@web/css/images_turn.css',['depends'=>['app\assets\AppAssetAO']]);
?>
<?php
//$model = $ActivityBanner;
//var_dump($model);exit();

?>
<div id="total">
    <div id="total_position">
        <div class="img_change">
            <?php
                foreach ($ActivityList as $item)
                {

                    $activity = $item->activity;
                    $user = $item->user;

                    $IsDel = '<font class="sign_up" onclick="DelOrder('.$item['OrderID'].')">取消</font>';
                    $TagArr = explode(',',$activity->Tag);
                    $TagStr = '';
                    foreach ($TagArr as $Tag) {
                        if (!empty($Tag)) $TagStr .= '<div><font>'.$Tag.'</font></div>';
                    }
                    $Cost = $activity->Cost =='0'?'免费':'¥'.$activity->Cost;
                    $DetailUrl = Url::toRoute(['activitylist/activity-detail','ActivityID'=>$activity->ID,'UserID'=>$user->UserID,'FromType' => 'MyOrder']);
                    $ActivityImg = Url::to('@web/image/Activity/'.$activity->Logo);

                    echo '<div class="img_mid order_id_'.$item['OrderID'].' ">
                <a href="'.$DetailUrl.'"><img src="'.$ActivityImg.'"/></a>
                <div class="content">
                    <div class="content_left">
                        <div class="content_title">
                            <font>'.$activity->Name.'</font>
                        </div>
                        <div class="content_style">
                            '.$TagStr.'
                        </div>
                        <div class="time">
                            <font>时间:'.date('Y.m.d',strtotime($activity->StartTime)).'-'.date('Y.m.d',strtotime($activity->EndTime)).'</font>
                        </div>
                    </div>
                    <div class="content_right">
                        <div class="content_right1">
                            <div class="money">
                                <font>'.$Cost.'</font>
                            </div>
                            <div class="bm_button AO_button_'.$item['OrderID'].'">
                                    '.$IsDel.'
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                }
            ?>





        </div>
    </div>
</div>
