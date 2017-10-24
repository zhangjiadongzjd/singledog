<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activitylist;
use yii\data\SqlDataProvider;

/**
 * ActivitylistSearch represents the model behind the search form about `app\models\Activitylist`.
 */
class ActivitylistSearch extends Activitylist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['Name', 'Category', 'Status', 'Type' , 'StartTime', 'EndTime', 'Tag', 'Logo', 'Desc'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Activitylist::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
//                'pagesize' => '50',
//                ''
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'StartTime' => $this->StartTime,
            'EndTime' => $this->EndTime,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Category', $this->Category])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Type', $this->Type])
            ->andFilterWhere(['like', 'Tag', $this->Tag])
            ->andFilterWhere(['like', 'Logo', $this->Logo])
            ->andFilterWhere(['like', 'Desc', $this->Desc]);

        return $dataProvider;
    }
    public function searchActList($params)
    {


        $this->load($params);

        $paramsArr = [];
        if(isset($params['ActivitylistSearch']) && !empty($params['ActivitylistSearch'])){
            $paramsArr = $params['ActivitylistSearch'];
        }
//        var_dump($paramsArr);exit();
        $query = "SELECT l.ID,l.`Name`,l.Cost,l.Logo,l.Tag,l.`Status`,l.StartTime,l.EndTime,o.OrderID,o.UserID,IF(o.OrderID IS NOT NULL,'YES','NO') AS HasOder FROM `activitylist` l LEFT JOIN activityorder o ON l.ID = o.ActivityID AND o.UserID = '".$paramsArr['UserID']."'  LEFT JOIN activityuser u ON u.UserID = o.UserID WHERE  l.Type = '".$paramsArr['Type']."' AND l.EndTime >= NOW() AND `Status` = 'YES' ORDER BY StartTime ASC,ID ;";
        $dataProvider = new SqlDataProvider([
        'sql' => $query,
//            'params' => '',
//            'totalCount' => 1000000,
//            'pagination' => ['pageSize' => 20,],
        ]);

        return $dataProvider;
    }
}
