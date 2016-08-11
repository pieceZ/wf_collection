<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Custom;

/**
 * CustomSearch represents the model behind the search form about `frontend\models\Custom`.
 */
class CustomSearch extends Custom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['custom_id'], 'integer'],
            [['custom_code', 'custom_name', 'custom_wf_url', 'custom_erp_url', 'custom_erp_version'], 'safe'],
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
        $query = Custom::find();

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
            'custom_id' => $this->custom_id,
        ]);

        $query->andFilterWhere(['like', 'custom_code', $this->custom_code])
            ->andFilterWhere(['like', 'custom_name', $this->custom_name])
            ->andFilterWhere(['like', 'custom_wf_url', $this->custom_wf_url])
            ->andFilterWhere(['like', 'custom_erp_url', $this->custom_erp_url])
            ->andFilterWhere(['like', 'custom_erp_version', $this->custom_erp_version]);

        return $dataProvider;
    }
}
