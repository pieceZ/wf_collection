<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\WorkflowLog */

$this->title = '工作流错误日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workflow-log-update">

    <!--Chart-box-->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>线状图</h5>
                </div>
                <div class="widget-content">
                    <div  id="line-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!--End-Chart-box-->

</div>
<?=Html::jsFile('@web/js/raphael-min.js')?>
<?=Html::jsFile('@web/js/morris/morris.min.js')?>
<script type="text/javascript">

    $(document).ready(function(){
        var d1 = <?php echo($dataProvider); ?>;
        var d2 = [];
        for(var i=0;i<d1.length;i++){
            d2.push({y:d1[i].DateTime,a:d1[i].Count});
        }

        // LINE CHART
        var bar = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: d2,
            lineColors: [ '#3c8dbc'],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['error'],
            hideHover: 'auto'
        });



    });
</script>


