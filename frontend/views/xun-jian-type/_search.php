<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\XunJianTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xun-jian-type-search">

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
            <?= $form->field($model, 'rule') ?>
        </div>
        <div class="span4">
            <?= $form->field($model, 'code') ?>
        </div>
        <div class="span4">
            <?= $form->field($model, 'support_version') ?>
        </div>
    </div>


    <div class="row-fluid">
        <div  class="span10"></div>
        <div class="span1"> <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?></div>
        <div class="span1"> <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?></div>
    </div>




    <?php ActiveForm::end(); ?>

</div>
