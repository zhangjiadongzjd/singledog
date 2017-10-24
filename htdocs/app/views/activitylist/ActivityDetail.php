<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '活动详情';
$this->registerCssFile('@web/css/details.css', ['depends' => ['app\assets\AppAssetAO']]);
?>

<div id="total">
    <div id="total_position">
        <div id="act_title">
            <a href="<?php
            if ($FromType == 'MyOrder'){
                echo Url::toRoute('activityorder/my-orders');
            }else{
                echo Url::toRoute('activitylist/order-list');
            }

            ?>">
                <div id="detail_back"></div>
            </a>
            <div id="act_title_middle">
                <p><?= $model->Name; ?></p>
            </div>
        </div>
        <div class="img_mid">
            <?php
                $ActivityImg = Url::to('@web/image/Activity/'.$model->Logo);
                echo Html::img($ActivityImg);
            ?>
            <div class="content">
                <div class="content_left">
                    <div class="content_title">
                        <font><?= $model->Name; ?></font>
                    </div>
                    <div class="content_style">
                          <?php

                          $TagArr = explode(',',$model->Tag);
                          $TagStr = '';
                          foreach ($TagArr as $Tag) {
                              if (!empty($Tag)) $TagStr .= '<div><font>'.$Tag.'</font></div>';
                          }
                          echo $TagStr;
                          ?>
                    </div>
                </div>
                <div class="content_right">
                    <div class="content_right1">
                        <div class="money">
                            <font><?php echo $model->Cost =='0'?'免费':'¥'.$model->Cost; ?></font>
                        </div>
                         <div class="bm_button  <?= 'AO_button_'.$model->ID;?>">
                             <?php
                             if ($HasOrder == 'YES') {
                                 $HasOder = '<font class="registered">已 报 名</font>';
                             }else{
                                 $HasOder = '<font class="sign_up" onclick="signUp('.$model->ID.','.$UserID.')">报 名</font>';
                             }
                             echo $HasOder;
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="act_time">
<!--            <div id="time_title">-->
<!--                <p>活动时间:</p>-->
<!--            </div>-->
            <div id="time">
                <p>活动时间: <?php echo date('Y.m.d',strtotime($model->StartTime)).'-'.date('Y.m.d',strtotime($model->EndTime)); ?></p>
            </div>
        </div>
        <div id="detail">
            <div id='details_desc'>
                <h1>活动详情</h1>
            </div>
            <div id='details_content'>
                <div class="detail-menu">
                    <div class="detail-content">
                        <p> <?= $model->Desc ?></p>
                    </div>
                </div>

            </div>
        </div>