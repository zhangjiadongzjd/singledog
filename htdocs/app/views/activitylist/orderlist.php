<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = '活动预定';
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
            <?php if (!empty($ActivityBanner)){
                $html = '<div class="img_top">                
                <div class="banner" id="b04" style="border-radius:20px">
                    <ul>';
                foreach ($ActivityBanner as $item) {
                    $DetailUrl = Url::toRoute(['activitylist/activity-detail','ActivityID'=>$item['ID'],'UserID'=>$UserInfo['UserID']]);
                    $ActivityImg = Url::to('@web/image/Activity/'.$item['Logo']);
                    $html .='<li><a href="'.$DetailUrl.'"><img src="'.$ActivityImg.'" width="1160" height="510" style="border-radius:20px"/></a></li>';
                }
                $html .= '</ul>
                    <a href="javascript:void(0);" class="unslider-arrow04 prev"><img class="arrow" id="al" src="image/clickleft.png" alt="prev" width="50" height="60"></a>
                    <a href="javascript:void(0);" class="unslider-arrow04 next"><img class="arrow" id="ar" src="image/clickright.png" alt="next" width="50" height="60"></a>
                </div>
            </div>';

                echo $html;
            } ?>
<!--            <div class="img_top">-->
<!--
<!--                <div class="banner" id="b04" style="border-radius:20px">-->
<!--                    <ul>-->
<!--                        <li><img src="0824ab18972bd407154c5f4b73899e510eb309f8.jpg" alt="" width="1160" height="510" style="border-radius:20px"/></li>-->
<!--                        <li><img src="e9db4f1.jpg" alt="" width="1160" height="510" style="border-radius:20px"/></li>-->
<!--                    </ul>-->
<!--                    <a href="javascript:void(0);" class="unslider-arrow04 prev"><img class="arrow" id="al" src="arrowl.png" alt="prev" width="20" height="35"></a>-->
<!--                    <a href="javascript:void(0);" class="unslider-arrow04 next"><img class="arrow" id="ar" src="arrowr.png" alt="next" width="20" height="37"></a>-->
<!--                </div>-->
<!---->
<!--            </div>-->
            <?php
                foreach ($ActivityList as $item)
                {

                    if ($item['HasOder'] == 'YES') {
                        $HasOder = '<font class="registered">已 报 名</font>';
                    }else{
                        $HasOder = '<font class="sign_up" onclick="signUp('.$item['ID'].','.$UserInfo['UserID'].')">报 名</font>';
                    }
                    $TagArr = explode(',',$item['Tag']);
                    $TagStr = '';
                    foreach ($TagArr as $Tag) {
                        if (!empty($Tag)) $TagStr .= '<div><font>'.$Tag.'</font></div>';
                    }
                    $Cost = $item['Cost'] =='0'?'免费':'¥'.$item['Cost'];
                    $DetailUrl = Url::toRoute(['activitylist/activity-detail','ActivityID'=>$item['ID'],'UserID'=>$UserInfo['UserID']]);
                    $ActivityImg = Url::to('@web/image/Activity/'.$item['Logo']);
                    echo '<div class="img_mid">
                <a href="'.$DetailUrl.'"><img src="'.$ActivityImg.'"/></a>
                <div class="content">
                    <div class="content_left">
                        <div class="content_title">
                            <font>'.$item['Name'].'</font>
                        </div>
                        <div class="content_style">
                            '.$TagStr.'
                        </div>
                        <div class="time">
                            <font>时间:'.date('Y.m.d',strtotime($item['StartTime'])).'-'.date('Y.m.d',strtotime($item['EndTime'])).'</font>
                        </div>
                    </div>
                    <div class="content_right">
                        <div class="content_right1">
                            <div class="money">
                                <font>'.$Cost.'</font>
                            </div>
                            <div class="bm_button AO_button_'.$item['ID'].'">
                                    '.$HasOder.'
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
