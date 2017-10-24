<?php 
namespace Home\Controller;
use Think\Controller;
class WeixinController extends Controller {
    public $access_token = '';
    public function __construct(){
        //$this->createMenu();
    }
    
//     define("ACCESS_TOKEN", 'YypuQ5BCvMl336-5R2uv1i71NzKNgm2hwRTHj3W7CcYZBE1mgtg-HrMPn0m4xtb9fRmqqm6CnjWKXjR3l7NOJ6UsuzgnI-NaNq9-11sEJEHe2S6x_jZ5ZeasSri9xOj5EIXiAAANRG');
    
    public function index(){
        //1.获得参数timestamp,nonce,token,signature,echostr
        $timestamp = $_GET['timestamp'];
        $nonce     = $_GET['nonce'];
        $token     = 'singledog';
        $signature = $_GET['signature'];
        $echostr   = $_GET['echostr'];
        $array     = array( $timestamp, $nonce, $token);
        sort( $array);
        //2.将排序后的三个参数拼接之后用sha1加密
        $tmpstr = implode('',$array);
        $tmpstr = sha1($tmpstr);
        //3.将加密后的字符串与signature进行对比,判断是否来自微信
        if( $tmpstr == $signature && $echostr){
            //第一次接入weixin api接口的时候
            echo $echostr;
            exit;
        }else{        
            $this->reponseMsg();
            //$this->createMenu();
        }
    }
    
    /* public function show(){
        echo '123';
    } */
    
    public function reponseMsg(){
        //1.获取到微信推送过来POST数据(xml格式)
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        //2.处理消息类型,并设置回复类型和内容
        /* <xml>
         <ToUserName><![CDATA[toUser]]></ToUserName>
         <FromUserName><![CDATA[FromUser]]></FromUserName>
         <CreateTime>123456789</CreateTime>
         <MsgType><![CDATA[event]]></MsgType>
         <Event><![CDATA[subscribe]]></Event>
         </xml> */
        $postObj = simplexml_load_string( $postArr);//$postObj是个对象
        //$postObj->ToUserName = '';
        //$postObj->FromUserName = '';
        //$postObj->CreateTime = '';
        //$postObj->MsgType = '';
        //$postObj->Event = '';
       //判断该数据包是否是订阅的事件推送
       if( strtolower( $postObj->MsgType) == 'event'){
           //如果是关注subscribe事件
           if( strtolower($postObj->Event) == 'subscribe'){
               //回复用户消息
               $toUser       = $postObj->FromUserName;
               $fromUserName = $postObj->toUserName;
               $time         = time();
               $msgType      = 'text';
               $content      = '欢迎关注香蕉大瓜皮';
               
               $template = "<xml>
                           <ToUserName><![CDATA[%s]]></ToUserName>
                           <FromUserName><![CDATA[%s]]></FromUserName>
                           <CreateTime>%s</CreateTime>
                           <MsgType><![CDATA[%s]]></MsgType>
                           <Content><![CDATA[%s]]></Content>
                           </xml>";
               $info = sprintf($template, $toUser, $fromUserName, $time, $msgType, $content);
               /*   <xml>
                    <ToUserName><![CDATA[toUser]]></ToUserName>
                    <FromUserName><![CDATA[fromUser]]></FromUserName>
                    <CreateTime>12345678</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[你好]]></Content>
                    </xml> */
               echo $info;
           }
       }
         
       if( strtolower( $postObj->MsgType) == 'text'){
          /*  if( $postObj->Content == '大香蕉'){ */
           switch($postObj->Content){
               case '大香蕉':
                   $content  = '老二就是6';
                   break;
               case '大瓜皮':
                   $content  = '老四就是无脑';
                   break;
               case '小香蕉':
                   $content  = '阿翔';
                   break;
               case '派哥':
                   $content  = '春天来了！';
                   break;
               case '派哥思春':
                   $content  = "<a href='http://www.singledog88.com/home.php/weixin/show'>你的对象</a>";
                   break;
           }
               $template = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[%s]]></MsgType>
                            <Content><![CDATA[%s]]></Content>
                            </xml>";
               $fromUser = $postObj->ToUserName;
               $toUser   = $postObj->FromUserName;
               $time     = time();
               //$content  = '老二就是6';
               $msgType  = 'text';
               echo sprintf($template, $toUser, $fromUserName, $time, $msgType, $content);
         /* } */    
      }
   }
   public function show(){
       //echo "<img src='".ROOT."/home/images/hotnews/844939851600817623.jpg' />";
      /*  $dsn = "mysql:host=localhost;dbname=ceshi";
       $db = new PDO($dsn, 'root', '');
       $count = $db->exec("select * from tp_action");
       var_dump($count); */
       $appid = 'wxe6b2fc2ab48d661d';
       $appsecret = '17abcb664ccc24c125564076fffbf8e8';
       $ch = curl_init();
       $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_TIMEOUT, 200);
       curl_setopt($ch, CURLOPT_HEADER, FALSE);
       curl_setopt($ch, CURLOPT_NOBODY, FALSE);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
       $tmpInfo = curl_exec($ch);
       $jsoninfo = json_decode($tmpInfo,true);
       $access_token = $jsoninfo["access_token"];
       var_dump($access_token);
       exit;
   }
   
   
   function getToken(){  
       $appid = 'wxe6b2fc2ab48d661d';
       $appsecret = '17abcb664ccc24c125564076fffbf8e8';
       $ch = curl_init();
       $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_TIMEOUT, 200);
       curl_setopt($ch, CURLOPT_HEADER, FALSE);
       curl_setopt($ch, CURLOPT_NOBODY, FALSE);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
       $tmpInfo = curl_exec($ch);
       $jsoninfo = json_decode($tmpInfo,true);
       $access_token = $jsoninfo["access_token"];
       
       return $access_token;
       curl_close($ch);
   }
   
   function createMenu(){
       $data = '{
                 "button":[
                 {
                       "name":"公共查询",
                       "sub_button":[
                        {
                           "type":"click",
                           "name":"天气查询",
                           "key":"tianQi"
                        },
                        {
                           "type":"click",
                           "name":"公交查询",
                           "key":"gongJiao"
                        },
                        {
                           "type":"click",
                           "name":"翻译",
                           "key":"fanYi"
                        }]
                  },
                  {
                       "name":"苏州本地",
                       "sub_button":[
                        {
                           "type":"click",
                           "name":"爱上苏州",
                           "key":"loveSuzhou"
                        },
                        {
                           "type":"click",
                           "name":"苏州景点",
                           "key":"suzhouScenic"
                        },
                        {
                           "type":"click",
                           "name":"苏州美食",
                           "key":"suzhouFood"
                        },
                        {
                           "type":"click",
                           "name":"住在苏州",
                           "key":"liveSuzhou"
                        }]
                   },
                   {
                       "type":"click",
                       "name":"联系我们",
                       "key":"lianxiUs"
                   }]
                }';
   
   
   //创建菜单实现
    if($this->access_token == ''){
       $this->access_token = $this->getToken();  
       $ch1 = curl_init();
       $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->access_token;
       curl_setopt($ch1, CURLOPT_URL, $url);
       curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, FALSE);
       //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
       curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
       curl_setopt($ch1, CURLOPT_AUTOREFERER, 1);
       curl_setopt($ch1, CURLOPT_POSTFIELDS, $data);
       curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
       $tmpInfo1 = curl_exec($ch1);
    } 
       curl_close($ch1);
  // return $tmpInfo1;
   var_dump($tmpInfo1);
   }
   
/*    function createMenu($data){
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
       curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $tmpInfo = curl_exec($ch);
       if (curl_errno($ch)) {
           return curl_error($ch);
       }
       curl_close($ch);
       return $tmpInfo;
   }
   
   
   $data = ' {
                "button":[
                   
                {
                "name":"时讯",
                "sub_button":[
                {
                "type":"click",
                "name":"即时新闻",
                "key":"jsxw"
                },
                {
                "type":"click",
                "name":"财经早餐",
                "key":"cjzc"
                },
                {
                "type":"click",
                "name":"焦点话题",
                "key":"jdht"
                },
                {
                "type":"view",
                "name":"财经日历",
                "url":"http://stock1.sina.cn/dpool/stockv2/universal_calendar.php?vt=4"
                }]
                },
                {
                "name":"说市",
                "sub_button":[
                {
                "type":"click",
                "name":"今日看盘",
                "key":"jrkp"
                },
                {
                "type":"view",
                "name":"行情刷新",
                "url":"http://XX/index.php/market/index"
                },
                {
                "type":"click",
                "name":"交易策略",
                "key":"jycl"
                },
                {
                "type":"click",
                "name":"投资天地",
                "key":"tztd"
                },
                {
                "type":"click",
                "name":"投资文库",
                "key":"tzwk"
                }]
                },
                {
                "name":"北鼎在线",
                "sub_button":[
                {
                "type":"view",
                "name":"关于我们",
                "url":"http://www.index.php/article/index/id/114"
                },
                {
                "type":"view",
                "name":"最新活动",
                "url":"http://www.index.php/article/index/id/115"
                },
                {
                "type":"view",
                "name":"参与爆料",
                "url":"http://www.index.php/message"
                }
                ]
                }
                   
                   
                   
                   
                ]
                }';
   
   
   
   echo createMenu($data);//创建菜单 */
  
}