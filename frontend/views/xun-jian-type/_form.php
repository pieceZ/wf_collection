<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\XunJianType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xun-jian-type-form">

    <?php $form = ActiveForm::begin([
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"span8\">{input}</div>",
            'labelOptions' => ['class' => 'span4'],
        ],
    ]); ?>


    <div class="row-fluid">
        <div class="span6">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="span6">
            <?= $form->field($model, 'rule')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?= $form->field($model, 'action_url')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="span6">
            <?= $form->field($model, 'support_version')->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <?= $form->field($model, 'remark' ,[
                'template'=>"{label}\n<div class=\"span10\">{input}</div>",
                'labelOptions' => ['class' => 'span2']
            ])->textarea(['rows' => 3,'style'=>'width:100%']) ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <?= $form->field($model, 'sql_text' ,[
                'template'=>"{label}\n<div class=\"span10\">{input}</div>",
                'labelOptions' => ['class' => 'span2']
            ])->textarea(['rows' => 8,'style'=>'width:100%']) ?>

        </div>
    </div>
    <div class="row-fluid">
        <div class="span5"></div>
        <div  class="span2"> <?= Html::submitButton($model->isNewRecord ? '提交新增' : '提交修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?></div>
        <div  class="span5"></div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
