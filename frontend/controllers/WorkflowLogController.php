<?php

namespace frontend\controllers;

use Yii;
use frontend\models\WorkflowLog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkflowLogController implements the CRUD actions for WorkflowLog model.
 */
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

    /**
     * Lists all WorkflowLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WorkflowLog::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WorkflowLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        //var_dump(Yii::$app->request->post());die;

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



    /**
     * Finds the WorkflowLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkflowLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
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
