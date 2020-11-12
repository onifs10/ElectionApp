<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ward */

$this->title = $model->ward_name;
$this->params['breadcrumbs'][] = ['label' => 'Wards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ward-view">

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
            'ward_id',
            'ward_name',
            'lga_id',
            'ward_description:ntext',
            'entered_by_user',
            'date_entered',
            'user_ip_address',
        ],
    ]) ?>
    <?= Html::a('view Polling Units',['/polling-unit','ward' => $model->uniqueid],['class' => 'btn btn-info' ]) ?>
</div>
