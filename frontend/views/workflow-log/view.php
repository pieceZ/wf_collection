<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\WorkflowLog */

$this->title = '日志详情';
$this->params['breadcrumbs'][] = ['label' => 'Workflow Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workflow-log-view">
<br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'LogGuid',
            'DateTime',
            'Message',
            'Type',
            'RequestUrl:ntext',
            'ClientIP',
            'RequestType',
            'PostData:ntext',
            'Browser',
            'Sessions:ntext',
            'Cookies:ntext',
            'ClientCode',
        ],
    ]) ?>

</div>
