<?php

namespace app\controllers;

use app\models\Activityuser;
use Yii;
use app\models\Activityorder;
use app\models\ActivityorderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivityorderController implements the CRUD actions for Activityorder model.
 */
class ActivityorderController extends Controller
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

    /**
     * Lists all Activityorder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActivityorderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//var_dump($dataProvider);exit();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function  actionMyOrders(){
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

        $searchModel = new ActivityorderSearch();
        $paramsList = array('ActivityorderSearch' => array('UserID'=>$UserInfo['UserID']));
        Yii::$app->request->setQueryParams($paramsList);
        $dataProvider = $searchModel->mySearch(Yii::$app->request->queryParams);
        $ActivityList = $dataProvider->getModels();

        return $this->render('myorder', [
            'searchModel' => $searchModel,
            'ActivityList' => $ActivityList,
            'UserInfo' => $UserInfo,
        ]);
    }

    /**
     * Displays a single Activityorder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Activityorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Activityorder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->OrderID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Activityorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->OrderID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Activityorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteOrder($id)
    {

        $res = $this->findModel($id)->delete();
        if ($res) return 1;
        return 0;
    }

    /**
     * Finds the Activityorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activityorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activityorder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionRedirectTo()
    {
        $appid= Yii::$app->params['WxAppID'];
        $redirect_uri = urlencode ( 'http://www.singledog88.com/app/web/index.php?r=activityorder/my-orders' );
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
}
