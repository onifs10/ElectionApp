<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\ResultTableWidget;
use app\components\ResultTable2Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Lga */

$this->title = $model->lga_name;
$this->params['breadcrumbs'][] = ['label' => 'Lgas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lga-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'uniqueid',
            'lga_id',
            'lga_name',
            [
                'label' => 'State',
                'value' => $model->state->state_name
            ],
            'lga_description:ntext',
            // 'entered_by_user',
            // 'date_entered',
            // 'user_ip_address',
        ],
    ]) ?>
    <?= Html::a('view Wards',['/wards','lga' => $model->lga_id],['class' => 'btn btn-info' ]) ?>
     <?= 
      ResultTable2Widget::widget(
        ['models' => $model->results]
    ); ?>
</div>
