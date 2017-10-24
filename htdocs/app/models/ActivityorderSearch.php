<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activityorder;

/**
 * ActivityorderSearch represents the model behind the search form about `app\models\Activityorder`.
 */
class ActivityorderSearch extends Activityorder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OrderID', ], 'integer'],
            [['PayStatus','UserID', 'ActivityID', 'AddTime'], 'safe'],
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
        $query = Activityorder::find();
        $query->joinWith(['user'])->joinWith(['activity']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'OrderID' => $this->OrderID,
//            'UserID' => $this->UserID,
//            'ActivityID' => $this->ActivityID,
            'AddTime' => $this->AddTime,
        ]);

        $query->andFilterWhere(['like', 'PayStatus', $this->PayStatus]);
        $query->andFilterWhere(['like', 'activityuser.nickname', $this->UserID]);
        $query->andFilterWhere(['like', 'activitylist.Name', $this->ActivityID]);

        return $dataProvider;
    }

    public function mySearch($params)
    {
        $query = Activityorder::find();
        $query->joinWith(['user'])->joinWith(['activity']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'OrderID' => $this->OrderID,
            'activityuser.UserID' => $this->UserID,
            'ActivityID' => $this->ActivityID,
            'AddTime' => $this->AddTime,
        ]);

        $query->andFilterWhere(['like', 'PayStatus', $this->PayStatus]);
//        $query->andFilterWhere(['like', 'activityuser.nickname', $this->UserID]);
//        $query->andFilterWhere(['like', 'activitylist.Name', $this->ActivityID]);

        return $dataProvider;
    }
}
