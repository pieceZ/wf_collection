<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Custom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"span6\">{input}</div>\n<div class=\"span3\">{error}</div>",
            'labelOptions' => ['class' => 'span3'],
        ],
    ]); ?>

    <div class="row-fluid">
        <div class="span6">
            <?= $form->field($model, 'custom_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="span6">
            <?= $form->field($model, 'custom_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?= $form->field($model, 'custom_wf_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="span6">
            <?= $form->field($model, 'custom_erp_url')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?= $form->field($model, 'custom_erp_version')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="span6">

        </div>
    </div>
    <div class="row-fluid">
        <div class="span5"></div>
        <div  class="span2"> <?= Html::submitButton($model->isNewRecord ? '提交新增' : '提交修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
        <div  class="span5"></div>

    </div>



    <?php ActiveForm::end(); ?>

</div>
