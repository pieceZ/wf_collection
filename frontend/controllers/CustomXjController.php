<?php

namespace frontend\controllers;

use frontend\models\XunJianType;
use Yii;
use frontend\models\CustomXj;
use frontend\models\CustomXjSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Custom;
use yii\data\ActiveDataProvider;


class CustomXjController extends Controller
{
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
        $searchModel = new CustomXjSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
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
        $model = new CustomXj();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $xj = new XunJianType();
            $xjModelList = $xj::find()->all();
            $xjList=[];

            foreach($xjModelList as $id=>$item){
                $xjList[$item->id]=$item->code;
            }

            $custom = new Custom();
            $customModelList = $custom::find()->all();
            $customList=[];

            foreach($customModelList as $id=>$item){
                $customList[$item->custom_id]= $item->custom_name;
            }

            return $this->render('create', [
                'model' => $model,
                'xjList' => $xjList,
                'customList' => $customList,
            ]);
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = CustomXj::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
