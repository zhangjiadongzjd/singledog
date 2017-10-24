<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activityuser".
 *
 * @property integer $UserID
 * @property string $openid
 * @property string $nickname
 * @property string $sex
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $headimgurl
 * @property string $subscribe_time
 * @property string $remark
 * @property string $groupid
 * @property string $addTime
 */
class Activityuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activityuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['openid'], 'required'],
            [['sex'], 'string'],
            [['addTime'], 'safe'],
            [['openid', 'nickname', 'city', 'province', 'country', 'headimgurl', 'subscribe_time', 'remark', 'groupid'], 'string', 'max' => 255],
            [['openid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UserID' => 'User ID',
            'openid' => 'Openid',
            'nickname' => 'Nickname',
            'sex' => 'Sex',
            'city' => 'City',
            'province' => 'Province',
            'country' => 'Country',
            'headimgurl' => 'Headimgurl',
            'subscribe_time' => 'Subscribe Time',
            'remark' => 'Remark',
            'groupid' => 'Groupid',
            'addTime' => 'Add Time',
        ];
    }

    public function findUserByOpenID($openId){

        $User = $this::find()->where(['openid'=>$openId])->one();
        if (!empty($User)) return $User;
        return false;
    }

    public function findUserByOpenIDOne($openId){
        $User = $this::find()->where(['openid'=>$openId])->one()->toArray();
        return $User;
    }

    public function saveData($UserInfoByWx){
        $UserInfo = array();
        $this->openid = $UserInfo['openid'] =  addslashes($UserInfoByWx['openid']);
        $this->nickname = $UserInfo['nickname'] = addslashes($UserInfoByWx['nickname']);
        $this->sex = $UserInfo['sex'] =  addslashes($UserInfoByWx['sex']);
        $this->city = $UserInfo['city'] =  addslashes($UserInfoByWx['city']);
        $this->province = $UserInfo['province'] =  addslashes($UserInfoByWx['province']);
        $this->country = $UserInfo['country'] =  addslashes($UserInfoByWx['country']);
        $this->headimgurl = $UserInfo['headimgurl'] =  addslashes($UserInfoByWx['headimgurl']);
        $this->remark = $UserInfo['remark'] =  addslashes($UserInfoByWx['remark']);
        $this->subscribe_time = $UserInfo['subscribe_time'] =  addslashes($UserInfoByWx['subscribe_time']);
        $this->addTime = $UserInfo['addTime'] =  date('Y-m-d H:i:s');
        $this->save();
        $UserInfo['UserID'] =  $this->UserID;
        return $UserInfo;

    }
}
