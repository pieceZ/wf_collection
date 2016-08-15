<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\XunJianType */

$this->title = '修改巡检类别: ' . ' ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Xun Jian Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="xun-jian-type-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
