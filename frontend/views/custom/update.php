<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Custom */

$this->title = '修改客户信息：' . $model->custom_name;
$this->params['breadcrumbs'][] = ['label' => 'Customs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->custom_id, 'url' => ['view', 'id' => $model->custom_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="custom-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
