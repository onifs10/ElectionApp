<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\console\widgets\Table;
use app\components\ResultTableWidget;
/* @var $this yii\web\View */
/* @var $model app\models\PollingUnit */

$this->title = $model->polling_unit_name;
$this->params['breadcrumbs'][] = ['label' => 'Polling Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="polling-unit-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->uniqueid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->uniqueid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="polling-unit-model" style="background-color: whitesmoke; border-radius: 10px; padding: 10px; margin-bottom: 20px; margin-top: 2px">
        <div class=" text-black-50">
                <label>Ward</label>
                <span class="text-danger"><?= \yii\helpers\Html::encode($model->ward ? $model->ward->ward_name: "") ?></span>
                <label>Lga</label>
                <span class="text-success"><?= \yii\helpers\Html::encode( $model->ward ?( $model->ward->lga ? $model->ward->lga->lga_name : " "): "") ?></span>
                <label>State</label>
                <span class="text-info"><?= \yii\helpers\Html::encode(  $model->ward ?( $model->ward->lga ? ($model->ward->lga->state ? $model->ward->lga->state->state_name : "" ) : " "): "") ?></span>
                <div>
                    <label>Polling Unit Number</label>
                    <span class="text-info"><?= \yii\helpers\Html::encode(  $model->polling_unit_number) ?></span>    
                </div>
                <div>
                    <h5>Location</h5>
                    <label>Lat</label>
                    <span class="text-info"><?= \yii\helpers\Html::encode(  $model->lat) ?></span>
                    <label>long</label>
                    <span class="text-info"><?= \yii\helpers\Html::encode(  $model->long) ?></span>
                </div>
            </div>
        </div>

        <?= 
            ResultTableWidget::widget(
                ['models' => $model->results]
            );
            // $this->render('_results', ['models' => $model->results]);
        ?>
     
    

</div>
