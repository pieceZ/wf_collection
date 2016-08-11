<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'custom_id') ?>

    <?= $form->field($model, 'custom_code') ?>

    <?= $form->field($model, 'custom_name') ?>

    <?= $form->field($model, 'custom_wf_url') ?>

    <?= $form->field($model, 'custom_erp_url') ?>

    <?php // echo $form->field($model, 'custom_erp_version') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
