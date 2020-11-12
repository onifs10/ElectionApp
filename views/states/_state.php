<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="polling-unit-model" style="background-color: whitesmoke; border-radius: 10px; padding: 10px; margin-bottom: 20px; margin-top: 2px">
<a  href="<?php echo Url::to(['view', 'id' => $model->state_id])  ?>">
    <span style="font-size: 20px;"> <?php echo Html::encode($model->state_name);  ?> </span>
</a>
</div>