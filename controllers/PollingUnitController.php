<?php

namespace app\controllers;

use Yii;
use Exception;
use app\base\Model;
use app\models\Party;
use yii\web\Controller;
use app\models\PollingUnit;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\models\AnnouncedPuResults;
use app\models\Ward;
use yii\web\NotFoundHttpException;

/**
 * PollingUnitController implements the CRUD actions for PollingUnit model.
 */
class PollingUnitController extends Controller
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
     * Lists all PollingUnit models.
     * @return mixed
     */
    public function actionIndex(int $ward = null)
    {
        if($ward){
            $ward = Ward::find()->where(['uniqueid' => $ward])->one();
            if($ward){
                $dataProvider = new ActiveDataProvider([
                    'query' => $ward->getPollingUnit()->orderBy('polling_unit_name DESC'),
                ]);
        
                return $this->render('index_ward', [
                    'dataProvider' => $dataProvider,
                    'ward_name' => $ward->ward_name
                ]);
            }
        }
        $dataProvider = new ActiveDataProvider([
            'query' => PollingUnit::find()->with('ward')->orderBy('polling_unit_name DESC'),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PollingUnit model.
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
     * Creates a new PollingUnit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PollingUnit(['scenario' => 'create']);
        $count = Party::find()->count();
        $modelsResult = [new AnnouncedPuResults([])];
        if ($model->load(Yii::$app->request->post())) {
            $modelsResult = Model::createMultiple(AnnouncedPuResults::class);
            Model::loadMultiple($modelsResult , \Yii::$app->request->post()); 
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsResult as $result) {
                            $result->polling_unit_uniqueid = $model->uniqueid;
                             if (! ($flag = $result->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->uniqueid]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            return $this->redirect(['view', 'id' => $model->uniqueid]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelsResult'=>(empty($modelsResult)) ? [new AnnouncedPuResults()] : $modelsResult,
            'count' => $count
        ]);
    }

    /**
     * Updates an existing PollingUnit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $count = Party::find()->count();
        $modelsResult = $model->results;
        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelsResult, 'result_id', 'result_id');
            $modelsResult = Model::createMultiple(AnnouncedPuResults::class,[$modelsResult]);
            Model::loadMultiple($modelsResult, \Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsResult, 'result_id', 'result_id')));
            $valid = $model->validate();
            if($valid){
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if($flag = $model->save(false))
                    {
                        if (! empty($deletedIDs)) {
                            AnnouncedPuResults::deleteAll(['result_id' => $deletedIDs]);
                        }
                        foreach ($modelsResult as $result) {
                            $result->polling_unit_uniqueid = $model->uniqueid;
                            if (! ($flag = $result->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->uniqueid]);
                        }
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }   
             
            }
        }
        return $this->render('update', [
            'model' => $model,
            'modelsResult'=> (empty($modelsResult)) ? [new AnnouncedPuResults()] : $modelsResult,
            'count' => $count
        ]);
    }

    /**
     * Deletes an existing PollingUnit model.
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
     * Finds the PollingUnit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PollingUnit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PollingUnit::find()->with('ward','results')->where(['uniqueid' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
