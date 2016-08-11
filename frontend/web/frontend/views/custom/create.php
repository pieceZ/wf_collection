<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Custom */

$this->title = 'Create Custom';
$this->params['breadcrumbs'][] = ['label' => 'Customs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="custom-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
