<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Custom */

$this->title = 'Update Custom: ' . ' ' . $model->custom_id;
$this->params['breadcrumbs'][] = ['label' => 'Customs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->custom_id, 'url' => ['view', 'id' => $model->custom_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="custom-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
