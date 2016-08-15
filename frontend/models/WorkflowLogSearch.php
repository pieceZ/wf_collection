<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\WorkflowLog;

/**
 * WorkflowLogSearch represents the model behind the search form about `frontend\models\WorkflowLog`.
 */
class WorkflowLogSearch extends WorkflowLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['LogGuid', 'DateTime', 'Message', 'Type', 'RequestUrl', 'ClientIP', 'RequestType', 'PostData', 'Browser', 'Sessions', 'Cookies', 'ClientCode'], 'safe'],
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
        $query = WorkflowLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'DateTime' => $this->DateTime,
        ]);

        $query->andFilterWhere(['like', 'LogGuid', $this->LogGuid])
            ->andFilterWhere(['like', 'Message', $this->Message])
            ->andFilterWhere(['like', 'Type', $this->Type])
            ->andFilterWhere(['like', 'RequestUrl', $this->RequestUrl])
            ->andFilterWhere(['like', 'ClientIP', $this->ClientIP])
            ->andFilterWhere(['like', 'RequestType', $this->RequestType])
            ->andFilterWhere(['like', 'PostData', $this->PostData])
            ->andFilterWhere(['like', 'Browser', $this->Browser])
            ->andFilterWhere(['like', 'Sessions', $this->Sessions])
            ->andFilterWhere(['like', 'Cookies', $this->Cookies])
            ->andFilterWhere(['like', 'ClientCode', $this->ClientCode]);

        return $dataProvider;
    }
}
