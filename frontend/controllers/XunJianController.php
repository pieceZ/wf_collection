<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Custom;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Request;

/**
 * WorkflowLogController implements the CRUD actions for WorkflowLog model.
 */
class XunJianController extends Controller
{
    private $_config = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HEADER         => false,
        CURLOPT_VERBOSE        => true,
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_SSL_VERIFYPEER => false,
        //CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'
    );
    public $request_options = array();
    public $options= array();

    public function actionIndex()
    {
        $custom = new Custom();

        $customList = $custom::find()->all();





        //echo "<pre>";var_dump($customList); echo "</pre>";die;

        foreach($customList as $id=>$model){
            $erpUrl = $model->custom_erp_url;
            $wfUrl =  $model->custom_wf_url;

            $url = $wfUrl."/"."abc.aspx";

            $ch =curl_init($url);
            $options =  array();
            curl_setopt_array($ch, $options);
            $output = curl_exec($ch);

            var_dump($output);
        }
        die;


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