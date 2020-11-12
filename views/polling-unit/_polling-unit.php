<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="polling-unit-model" style="background-color: whitesmoke; border-radius: 10px; padding: 10px; margin-bottom: 20px; margin-top: 2px">
<a  href="<?php echo Url::to(['view', 'id' => $model->uniqueid])  ?>">
    <span style="font-size: 20px;"> <?php echo Html::encode($model->polling_unit_name);  ?> </span>
</a>
<div class=" text-black-50">
        <label>Ward</label>
        <span class="text-danger"><?= \yii\helpers\Html::encode($model->ward ? $model->ward->ward_name: "") ?></span>
        <label>Lga</label>
        <span class="text-success"><?= \yii\helpers\Html::encode( $model->ward ?( $model->ward->lga ? $model->ward->lga->lga_name : " "): "") ?></span>
        <label>State</label>
        <span class="text-info"><?= \yii\helpers\Html::encode(  $model->ward ?( $model->ward->lga ? ($model->ward->lga->state ? $model->ward->lga->state->state_name : "" ) : " "): "") ?></span>
    </div>
</div>