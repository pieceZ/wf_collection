<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\WorkflowLog */

$this->title = '日志柱状图';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workflow-log-update">

    <!--Chart-box-->
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
                    <h5>柱状图</h5>
                </div>
                <div class="widget-content">
                    <div  id="bar-chart"></div>
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

        //BAR CHART
        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: d2,
            barColors: [ '#f56954'],
            xkey: 'y',
            ykeys: ['a'],
            labels: ['error'],
            hideHover: 'auto'
        });
    });
</script>


