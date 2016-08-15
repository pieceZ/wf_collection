<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomXjSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '客户巡检';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-xj-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增客户巡检', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('巡检选中规则', "javascript:void(0);", ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\CheckboxColumn',
                'name' => 'id',
            ],
            [

                'label' => '客户名称',
                'value' => function ($model, $key, $index, $column){
                    return $model['custom'][0]['custom_name'];
                },
            ],
            [

                'label' => 'ERP版本',
                'value' => function ($model, $key, $index, $column){
                    return $model['custom'][0]['custom_erp_version'];
                },
            ],
            [

                'label' => '工作流Url',
                'value' => function ($model, $key, $index, $column){
                    return $model['custom'][0]['custom_wf_url'];
                },
            ],
            [

                'label' => '巡检编码',
                'value' => function ($model, $key, $index, $column){
                    return $model['xjType'][0]['code'];
                },
            ],
            [

                'label' => '巡检规则',
                'value' => function ($model, $key, $index, $column){

                    return $model['xjType'][0]['rule'];
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '80px;'],
                'header' => '操作',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('查看', $url, $options);
                    },


                ],
            ],
        ],
    ]); ?>

</div>
