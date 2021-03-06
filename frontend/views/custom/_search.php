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
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"span6\">{input}</div>\n<div class=\"span3\">{error}</div>",
            'labelOptions' => ['class' => 'span3'],
        ],
    ]); ?>
    <div class="row-fluid">
        <div class="span4">
            <?= $form->field($model, 'custom_name') ?>
        </div>
        <div class="span4">
            <?= $form->field($model, 'custom_code') ?>
        </div>
        <div class="span4">
            <?= $form->field($model, 'custom_erp_version') ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <?= $form->field($model, 'custom_erp_url') ?>
        </div>
        <div class="span4">
            <?= $form->field($model, 'custom_wf_url') ?>
        </div>
        <div class="span4">

        </div>
    </div>

    <div class="row-fluid">
        <div  class="span10"></div>
        <div class="span1"> <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?></div>
        <div class="span1"> <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?></div>
    </div>


    <?php // echo $form->field($model, 'custom_erp_version') ?>


    <?php ActiveForm::end(); ?>

</div>
