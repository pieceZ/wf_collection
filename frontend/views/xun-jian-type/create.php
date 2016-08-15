<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\XunJianType */

$this->title = '新增巡检类别';
$this->params['breadcrumbs'][] = ['label' => 'Xun Jian Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xun-jian-type-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
