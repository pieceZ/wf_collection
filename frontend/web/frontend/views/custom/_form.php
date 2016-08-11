<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Custom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="custom-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'custom_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custom_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custom_wf_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custom_erp_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'custom_erp_version')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
