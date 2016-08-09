<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '工作流错误日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workflow-log-index">




    <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>日志列表</h5>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>Message</th>
                    <th>DateTime</th>
                    <th>Type</th>
                    <th>ClientCode</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($dataProvider->getModels() as $id=>$model) { ?>
                    <tr class="gradeX">
                        <td><?php echo($model->Message)?></td>
                        <td><?php echo($model->DateTime)?></td>
                        <td><?php echo($model->Type)?></td>
                        <td class="center"><?php echo($model->ClientCode)?></td>
                    </tr>
                <?php };?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?=Html::jsFile('@web/js/jquery.dataTables.min.js')?>
<script type="text/javascript">
    $(document).ready(function(){

        $('.data-table').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""l>t<"F"fp>'
        });


    });
</script>
