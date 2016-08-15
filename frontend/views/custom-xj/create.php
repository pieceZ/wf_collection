<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomXj */

$this->title = '客户巡检规则设置';
$this->params['breadcrumbs'][] = ['label' => 'Custom Xjs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=Html::cssFile('@web/js/pickList/pickList.css')?>
<div class="custom-xj-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'custom_id')->label('客户名称')->dropDownList($customList, ['prompt'=>'请选择','style'=>'width:220px']); ?>
    <?= $form->field($model, 'xj_type_id')->label('巡检规则')->dropDownList($xjList, ['prompt'=>'请选择','style'=>'width:220px']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
