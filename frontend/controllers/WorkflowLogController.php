<?php

namespace frontend\controllers;

use Yii;
use frontend\models\WorkflowLog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\WorkflowLogSearch;


class WorkflowLogController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WorkflowLog::find(),
            'pagination' => [
                'pagesize' => '10',
            ],
        ]);


        return $this->render('index', [

            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $postData = file_get_contents('php://input');

        $jsonData = json_decode($postData,true);

        $model = new WorkflowLog();

        if($model->load($jsonData)){
            if (!$model->save()) {
                var_dump($model->errors);
            }
        }
      }


    public function actionBarChart()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WorkflowLog::findBySql("select DATE_FORMAT(DateTime,'%Y-%m-%d') DateTime,count(1) Type from workflow_log GROUP BY TO_DAYS(DateTime)"),
        ]);

        $arr=[];
        $data = $dataProvider->getModels();
        foreach($data as $id=>$model){
            $arr2 = array( "DateTime" => $model->DateTime ,"Count" =>  $model->Type);
            $arr[$id]= $arr2;
        }
        return $this->render('bar-chart', [
            'dataProvider' => json_encode($arr),
        ]);
    }

    public function actionLineChart()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WorkflowLog::findBySql("select DATE_FORMAT(DateTime,'%Y-%m-%d') DateTime,count(1) Type from workflow_log GROUP BY TO_DAYS(DateTime)"),
        ]);

        $arr=[];
        $data = $dataProvider->getModels();
        foreach($data as $id=>$model){
            $arr2 = array( "DateTime" => $model->DateTime ,"Count" =>  $model->Type);
            $arr[$id]= $arr2;
        }
        return $this->render('line-chart', [
            'dataProvider' => json_encode($arr),
        ]);
    }

    public function actionCustomBarChart()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WorkflowLog::findBySql("select IFNULL(ClientCode,'δ֪') as ClientCode,count(1) Type from workflow_log GROUP BY ClientCode"),
        ]);

        $arr=[];
        $data = $dataProvider->getModels();
        foreach($data as $id=>$model){
            $arr2 = array( "ClientCode" => $model->ClientCode ,"Count" =>  $model->Type);
            $arr[$id]= $arr2;
        }
        return $this->render('custom-bar-chart', [
            'dataProvider' => json_encode($arr),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = WorkflowLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function GetLogListIndex()
    {
        //$erpapi = I("erpapi");
        //$erp = I("erp");
        $erpapi="http://yddemo.mysoft.com.cn:9000";
        $wfsite ="http://10.5.106.183:6034";
        $site = "fdccloud_zl02308";

        $serviceurl = rawurlencode(AesHelper::encrypt($wfsite));

        $jiekou = "Collection/GetLogFileInfos";

        $url = $erpapi."/".$site."/api/workflow/".$jiekou.".ashx?serviceurl=".$serviceurl;

        //echo $url; die;
        $curl = new Curl();

        //echo $url;die;
        $result['list'] = $curl->get($url);
        echo $result['list'];

        return $this->render('index');
    }
}
