<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomXjSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-xj-search">

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
            <?= $form->field($model, 'code') ?>
        </div>
        <div class="span4">
            <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
