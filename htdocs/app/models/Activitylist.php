<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activitylist".
 *
 * @property integer $ID
 * @property string $Name
 * @property string $Category
 * @property string $Status
 * @property string $StartTime
 * @property string $EndTime
 * @property string $Tag
 * @property string $Logo
 * @property string $Desc
 */
class Activitylist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activitylist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'Name', 'StartTime', 'EndTime'], 'required'],
            [['ID'], 'integer'],
            [['Status','Type', 'Desc'], 'string'],
            [['StartTime', 'EndTime'], 'safe'],
            [['Name', 'Category', 'Tag'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => '活动号',
            'Name' => '活动名',
            'Type' => '活动位置',
            'Category' => '类别',
            'Status' => '在线状态',
            'StartTime' => '开始时间',
            'EndTime' => '结束时间',
            'Tag' => '标签',
            'Logo' => 'Logo',
            'Desc' => '活动描述',
        ];
    }
}
