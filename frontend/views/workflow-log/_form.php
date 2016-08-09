<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WorkflowLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workflow-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LogGuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateTime')->textInput() ?>

    <?= $form->field($model, 'Message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RequestUrl')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ClientIP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RequestType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PostData')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Browser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sessions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Cookies')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ClinetCode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
