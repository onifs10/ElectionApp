<?php
/* @var $this yii\web\View */

use app\models\Lga;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;

$this->title = 'Lgas Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lga-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Pick Lga' ,[''],['class' => 'btn btn-success']) ?>
    <?= 
        ListView::widget(
            [
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => '_results'
            ]
        )
    ?>
</div>