<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activityorder".
 *
 * @property integer $OrderID
 * @property integer $UserID
 * @property integer $ActivityID
 * @property string $PayStatus
 * @property string $AddTime
 */
class Activityorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activityorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserID', 'ActivityID'], 'integer'],
            [['PayStatus'], 'string'],
            [['AddTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'OrderID' => '订单号',
            'UserID' => '用户',
            'ActivityID' => '活动',
            'PayStatus' => '支付状态',
            'AddTime' => '预定时间',
        ];
    }

    public function findOrderByID($Parms){
        $ActivityID = $Parms['ActivityID'];
        $UserID = $Parms['UserID'];
        $User = $this::find()->where(['ActivityID'=>$ActivityID,'UserID'=>$UserID])->one();
        if (!empty($User)) return true;
        return false;
    }

    public function saveData($Parms){
        $ActivityID = (int) $Parms['ActivityID'];
        $UserID = (int) $Parms['UserID'];
        $this->ActivityID =  addslashes($ActivityID);
        $this->UserID = addslashes($UserID);
        $this->AddTime =  date('Y-m-d H:i:s');
        $res = $this->save();
        return $res;
    }

    public function getUser(){
        return $this->hasOne(Activityuser::className(),['UserID'=>'UserID']);
    }

    public function getActivity(){
        return $this->hasOne(Activitylist::className(),['ID'=>'ActivityID']);
    }
}
