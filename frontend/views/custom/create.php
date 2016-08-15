<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Custom */

$this->title = '新增客户';
$this->params['breadcrumbs'][] = ['label' => 'Customs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
