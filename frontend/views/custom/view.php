<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Custom */

$this->title = $model->custom_name;
$this->params['breadcrumbs'][] = ['label' => 'Customs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-view">

    <h3><?= Html::encode($this->title) ?></h3>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'custom_id',
            'custom_code',
            'custom_name',
            'custom_wf_url:url',
            'custom_erp_url:url',
            'custom_erp_version',
        ],
    ]) ?>

</div>
