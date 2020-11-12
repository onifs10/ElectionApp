<?php

namespace app\controllers;

use app\models\LgaResult;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class LgaResultsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new LgaResult();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $dataProvider = new ActiveDataProvider(
                [
                  'query' =>  $model->getResults()
                ]
            );
            return $this->render('list' , ['dataProvider' => $dataProvider]);
        }
        return $this->render('index' ,['model' => $model]);
    }
    

}
