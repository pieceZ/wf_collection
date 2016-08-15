<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;



class CustomXjSearch extends CustomXj
{

    public $custom_name;
    public $code;


    public function rules()
    {
        return [
            [['id', 'custom_id', 'xj_type_id'], 'integer'],
            [['custom_name','code'],'safe'],
        ];
    }
    public function attributeLabels()
    {
        return [

            'code' => '巡检编码',
            'custom_name' => '客户名称',

        ];
    }



    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {


        $query = CustomXj::find();
        $query->joinWith(['custom'])->joinWith('xjType');


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
            'custom_id' => $this->custom_id,
            'xj_type_id' => $this->xj_type_id,
        ]);
        $query->andFilterWhere(['like','custom.custom_name',$this->custom_name]);
        $query->andFilterWhere(['like','xun_jian_type.code',$this->code]);

        return $dataProvider;
    }
}
