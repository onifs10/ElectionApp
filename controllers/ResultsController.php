<?php

namespace app\controllers;

use Yii;
use app\models\Lga;
use app\models\Ward;
use app\models\States;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\AnnouncedPuResults;
use yii\web\NotFoundHttpException;

/**
 * ResultsController implements the CRUD actions for AnnouncedPuResults model.
 */
class ResultsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AnnouncedPuResults models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AnnouncedPuResults::find()->with('pu'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AnnouncedPuResults model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AnnouncedPuResults model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AnnouncedPuResults(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->result_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AnnouncedPuResults model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->result_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AnnouncedPuResults model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AnnouncedPuResults model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AnnouncedPuResults the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AnnouncedPuResults::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionState($id)
    {
        $state = States::find()->where(['state_id' => $id])->one();
        echo '<option value>Select LGA</option>';
        if($state)
        {
            if($lgas = $state->lga)
            {
                foreach($lgas as $lga)
                {
                    echo "<option value='" . $lga->uniqueid ."'>" . $lga->lga_name ."</option>"; 
                }
            }else{
            echo '<option> </option>';
            };
        }else{
            echo '<option> </option>';
        }
    }
    public function actionLga($id)
    {
        $lga = Lga::find()->where(['uniqueid' => $id])->one();
        echo '<option value>Select Ward</option>';
        if($lga)
        {
            if($wards = $lga->ward)
            {
                foreach($wards as $ward)
                {
                    echo "<option value='" . $ward->uniqueid ."'>" . $ward->ward_name ."</option>"; 
                }
            }else{
            echo '<option> </option>';
            };
        }else{
            echo '<option> </option>';
        }
    }
    public function actionPolling($id)
    {
        $ward = Ward::find()->where(['uniqueid' => $id])->one();
        echo '<option value>Select Polling Unit</option>';
        if($ward)
        {
            if($Pollings = $ward->pollingUnit)
            {
                foreach($Pollings as $polling)
                {
                    echo "<option value='" . $polling->uniqueid ."'>" . $polling->polling_unit_name ."</option>"; 
                }
            }else{
            echo '<option> </option>';
            };
        }else{
            echo '<option> </option>';
        }
    }
}
