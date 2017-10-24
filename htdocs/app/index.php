<?php
$appid='wx9c7e34f86b42b0a1';
        $redirect_uri = urlencode ( 'http://www.singledog88.com/app/getUserInfo.php' );
        // $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        // var_dump($url);exit();
        header("Location:".$url);