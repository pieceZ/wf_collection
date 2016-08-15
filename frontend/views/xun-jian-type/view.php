<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\XunJianType */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Xun Jian Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xun-jian-type-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'rule',
            'remark:ntext',
            'sql_text:ntext',
            'action_url:url',
            'support_version',
        ],
    ]) ?>

</div>
