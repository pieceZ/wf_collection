<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomXj */

$this->title = $model->custom[0]['custom_name'].':'. $model->xjType[0]['code'];
$this->params['breadcrumbs'][] = ['label' => 'Custom Xjs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-xj-view">

    <h3><?= Html::encode($this->title) ?></h3>


    <div class="row-fluid">
    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th class="span3">{label}</th><td class="span9">{value}</td></tr>',
        'attributes' => [
            [

                'label' => '客户编码',
                'value' => $model['custom'][0]['custom_code'],
            ],
            [

                'label' => '客户名称',
                'value' => $model['custom'][0]['custom_name'],
            ],
            [

                'label' => 'ERP版本',
                'value' => $model['custom'][0]['custom_erp_version'],
            ],
            [

                'label' => '工作流Url',
                'value' => $model['custom'][0]['custom_wf_url'],
            ],
            [

                'label' => 'ERPUrl',
                'value' => $model['custom'][0]['custom_erp_url'],
            ],
            [

                'label' => '巡检编码',
                'value' => $model['xjType'][0]['code'],
            ],
            [

                'label' => '巡检规则',
                'value' => $model['xjType'][0]['rule'],
            ],
            [

                'label' => '巡检备注',
                'value' => $model['xjType'][0]['remark'],
            ],
            [

                'label' => '巡检SQL',
                'value' =>$model['xjType'][0]['sql_text'],
            ],
        ],
    ]) ?>
    </div>
</div>
