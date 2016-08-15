<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '日志列表';
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
                        <td><a href="<?php echo Url::to(['workflow-log/view', 'id' => $model->id]) ?>" ><?php echo($model->Message)?></a></td>
                        <td><?php echo($model->DateTime)?></td>
                        <td><?php echo($model->Type)?></td>
                        <td class="center"><?php echo($model->ClientCode)?></td>
                    </tr>
                <?php };?>

                </tbody>
            </table>
        </div>
        <style type="text/css">
            .log_pagination li { display: inline-block;}
            .log_pagination .pagination {float:right;}
        </style>
        <div class="log_pagination"><?php echo \yii\widgets\LinkPager::widget([
                    'pagination'=>$dataProvider->pagination,
                    'prevPageLabel'=>'上一页',
                    'nextPageLabel'=>'下一页',
                    'lastPageLabel'=> '尾页',
                    'firstPageLabel' => '首页',
                ]) ?></div>
    </div>
</div>
<?=Html::jsFile('@web/js/jquery.dataTables.min.js')?>
<script type="text/javascript">
    $(document).ready(function(){
//
//        $('.data-table').dataTable({
//            "bJQueryUI": true,
//            "sPaginationType": "full_numbers",
//            "sDom": '<""l>t<"F"fp>'
//        });


    });
</script>
