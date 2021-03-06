<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '客户信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增客户信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'custom_code',
            'custom_name',
            'custom_wf_url:url',
            'custom_erp_url:url',
            'custom_erp_version',

            ['class' => 'yii\grid\ActionColumn',
                'header' => '操作',

                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('查看', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('修改', $url, $options);
                    },

                ],
            ],
        ],
    ]); ?>

</div>
