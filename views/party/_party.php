<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="polling-unit-model" style="background-color: whitesmoke; border-radius: 10px; padding: 10px; margin-bottom: 20px; margin-top: 2px">
<a  href="<?php echo Url::to(['view', 'id' => $model->id])  ?>">
    <span style="font-size: 20px;"> <?php echo Html::encode($model->partyname);  ?> </span>
</a>
<div class=" text-black-50">
        <label>Party Name</label>
        <span class="text-danger"><?= \yii\helpers\Html::encode( $model->partyid) ?></span> 
    </div>
</div>