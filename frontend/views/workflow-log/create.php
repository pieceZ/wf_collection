<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\WorkflowLog */

$this->title = 'Create Workflow Log';
$this->params['breadcrumbs'][] = ['label' => 'Workflow Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workflow-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
