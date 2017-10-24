<?php

namespace app\controllers;

use app\models\Activityorder;
use app\models\Activityuser;
use vova07\imperavi\actions\GetAction;
use Yii;
use app\models\Activitylist;
use app\models\ActivitylistSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ActivitylistController implements the CRUD actions for Activitylist model.
 */
class ActivitylistController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        $ActivityUploadImg = Url::to('./image/Activity/desc/');
        $ActivityImg = Url::to('@web/image/Activity/desc/');
        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                // Directory URL address, where files are stored.
                'url' => $ActivityUploadImg,
                // Or absolute path to directory where files are stored.
                'path' => $ActivityUploadImg,
                'validatorOptions' => [
//                    'maxWidth' => 1000,
//                    'maxHeight' => 1000,
                    'maxSize' => 15000000,
                ]
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => $ActivityImg, // Directory URL address, where files are stored.
                'path' => $ActivityImg, // Or absolute path to directory where files are stored.
                'type' => GetAction::TYPE_IMAGES,
            ]
        ];
    }

    /**
     * Lists all Activitylist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivitylistSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionOrderList()
    {
        $this->layout = "main_website";
        $session = Yii::$app->session;
        $user = new Activityuser();

//        $openid ='oiqKit-Uv7d3bEyN1Qb3N0nsWBpU';
//        $session->set('openid', $openid);
//        $openid = $session['openid'];
//        $UserInfo = $user->findUserByOpenIDOne($openid);

        if (!isset($session['openid']) && empty($session['openid'])){
             $appID = Yii::$app->params['WxAppID'];
             $secret = Yii::$app->params['WxSecret'];
             $UserInfo =  $this->getUserInfo($appID,$secret);
             $openid = $UserInfo['openid'];
             $session->set('openid', $openid);
        }else{
            $openid = $session['openid'];
            $UserInfo = $user->findUserByOpenIDOne($openid);
        }

        $searchModel = new ActivitylistSearch();

        $paramsList = array('ActivitylistSearch' => array('UserID'=>$UserInfo['UserID'],'Type'=>'List'));
        Yii::$app->request->setQueryParams($paramsList);
        $dataProviderList = $searchModel->searchActList(Yii::$app->request->queryParams);
        $ActivityList = $dataProviderList->getModels();

        $paramsBanner = array('ActivitylistSearch' => array('UserID'=>$UserInfo['UserID'],'Type'=>'Banner'));
        Yii::$app->request->setQueryParams($paramsBanner);
        $dataProviderBanner = $searchModel->searchActList(Yii::$app->request->queryParams);
        $ActivityBanner = $dataProviderBanner->getModels();

        return $this->render('orderlist', [
            'searchModel' => $searchModel,
            'ActivityList' => $ActivityList,
            'ActivityBanner' => $ActivityBanner,
            'UserInfo' => $UserInfo,
        ]);
    }

    public function actionOrderActivity()
    {
        $Parms = Yii::$app->request->get();
        $Order  = new Activityorder();
        $res = $Order->findOrderByID($Parms);
        if (!empty($res)) return 0;
        $res = $Order->saveData($Parms);
        if (!$res) return 1;
        return 1;
    }
    /**
     * Displays a single Activitylist model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionActivityDetail()
    {

        $this->layout = "main_website";
        $Order  = new Activityorder();
        $Params = Yii::$app->request->get();
        $ActivityID = $Params['ActivityID'];
        $UserID = $Params['UserID'];
        $FromType = isset($Params['FromType'])?$Params['FromType']:'';
        $res = $Order->findOrderByID($Params);
        $HasOrder = $res ?'YES':'NO';

        return $this->render('ActivityDetail', [
            'model' => $this->findModel($ActivityID),
            'HasOrder' => $HasOrder,
            'UserID' => $UserID,
            'FromType' => $FromType
        ]);
    }

    /**
     * Creates a new Activitylist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activitylist();
        $imageUploadFile = UploadedFile::getInstance($model, 'Logo');
        if ($imageUploadFile != null) {
            $saveUrl = $this->UploadImg($imageUploadFile);
            $model->Logo = $saveUrl;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activitylist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $ImgLogo  = $model->Logo;
        $imageUploadFile = UploadedFile::getInstance($model,'Logo');
        if ($imageUploadFile != null) {
            $saveUrl = $this->UploadImg($imageUploadFile);
            $model->Logo = $saveUrl;
        }else{
            $model->Logo = $ImgLogo;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activitylist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Activitylist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activitylist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activitylist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionRedirectTo()
    {
        $appid= Yii::$app->params['WxAppID'];
        $redirect_uri = urlencode ( 'http://www.singledog88.com/app/web/index.php?r=activitylist/order-list' );
        // $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$redirect_uri&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        // var_dump($url);exit();
        header("Location:".$url);
    }


    protected function getUserInfo($appID,$secret){
        $code = isset($_GET["code"]) ? $_GET["code"] :'';
//第一步:取全局access_token
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appID&secret=$secret";
        $token = $this->getJson($url);

//第二步:取得openid
        $oauth2Url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appID&secret=$secret&code=$code&grant_type=authorization_code";
        $oauth2 = $this->getJson($oauth2Url);

//第三步:根据全局access_token和openid查询用户信息
        $access_token = $token["access_token"];
        $openid = $oauth2['openid'];

        $user = new Activityuser();
        $UserInfoRes = $user->findUserByOpenID($openid);
//var_dump($UserInfo);exit();
        if (empty($UserInfoRes)){
            $get_user_info_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
            $UserInfoByWx = $this->getJson($get_user_info_url);
            $UserInfo = $user->saveData($UserInfoByWx);
        }else{
            $UserInfo = $user->findUserByOpenIDOne($openid);
        }


        return $UserInfo;
    }

    protected function getJson($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }

    private function UploadImg($imageUploadFile){
//        $helper = new Helper();
        if ($imageUploadFile == null)
        {
            return null;
        }
        $imageFileExt = strtolower($imageUploadFile->getExtension());
        $save_path    = \Yii::$app->params['img_logo'];
        if (!file_exists($save_path))
        {
            mkdir($save_path, 0777, true);
        }
        $img_prefix    = time();
        $imageFileName = $img_prefix . '.' . $imageFileExt;
        $tmp_path = $imageUploadFile->tempName;
        $dst_w=200;
        $dst_w2=294;
        $this->disposeImgAction($tmp_path, $dst_w, $save_path, $imageFileName);
//        $this->disposeImgAction($tmp_path, $dst_w2, $save_path, 'b_'.$imageFileName);
        $imageUploadFile->saveAs($save_path .'/'.$imageFileName);
        return  $imageFileName;
    }

    private static function disposeImgAction($tmp_path, $dst_w, $file_path, $file_name)
    {
        $arr=getimagesize($tmp_path);
        $src_w=$arr[0];
        $src_h=$arr[1];
        $type=$arr[2];
        switch($type){
            case 1:$src_im = imagecreatefromgif($tmp_path);break;
            case 2:$src_im = imagecreatefromjpeg($tmp_path);break;
            case 3:$src_im = imagecreatefrompng($tmp_path);break;
            // default:UtlsSvc::showMsg('不支持该图片类型','/coinproduct/index/');
        }

        if ($dst_w == 200) {
            $dst_h = 50;
        } elseif ($dst_w == 150) {
            $dst_h = 44;
        } elseif ($dst_w == 120) {
            $dst_h = 30;
        }elseif ($dst_w == 294) {
            $dst_h = 82;
        }

        $dst_im=imagecreatetruecolor($dst_w,$dst_h);
        $white = imagecolorallocate($dst_im, 255, 255, 255);
        imagefill($dst_im, 0, 0, $white);
        imagecopyresized($dst_im,$src_im,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
        imagejpeg($dst_im, $file_path.'/'.$file_name);

        ImageDestroy ($src_im);
        ImageDestroy ($dst_im);
    }
}
