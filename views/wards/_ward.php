<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="polling-unit-model" style="background-color: whitesmoke; border-radius: 10px; padding: 10px; margin-bottom: 20px; margin-top: 2px">
<a  href="<?php echo Url::to(['view', 'id' => $model->uniqueid])  ?>">
    <span style="font-size: 20px;"> <?php echo Html::encode($model->ward_name);  ?> </span>
</a>
<div class=" text-black-50">
        <p><?= Html::encode($model->ward_description)?></p>
        <label>Lga</label>
        <span class="text-success"><?= \yii\helpers\Html::encode( $model->lga ? $model->lga->lga_name : " ") ?></span>
        <label>State</label>
        <span class="text-info"><?= \yii\helpers\Html::encode( $model->lga ? ($model->lga->state ? $model->lga->state->state_name : "" ) : " ") ?></span>
    </div>
</div>