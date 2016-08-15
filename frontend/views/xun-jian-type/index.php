<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\XunJianTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '巡检类别';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xun-jian-type-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增巡检类别', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'code',
            'rule',
            'action_url:url',
            [
                'label'=>'支持版本',
                'value'=>'support_version',
                'headerOptions' => ['width' => '60'],
            ],
            ['class' => 'yii\grid\ActionColumn',
                'options' => ['width' => '80px;'],
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
