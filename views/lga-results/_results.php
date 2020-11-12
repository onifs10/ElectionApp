<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\ResultTable2Widget;
?>
<div class="bg-info" style="margin-top: 5px;">

<div class="text-center polling-unit-model" style="background-color: whitesmoke; border-radius: 10px; padding: 10px; margin-bottom: 20px; margin-top: 2px">

    <strong><span style="font-size: 20px; "> <?php echo Html::encode($model->lga_name);  ?> </span></strong>    
    <div class=" text-black-50">
        <label>State</label>
        <span class="text-danger"><?= \yii\helpers\Html::encode($model->state ? $model->state->state_name: "") ?></span>
    </div>
</div>
<?= 
      ResultTable2Widget::widget(
        ['models' => $model->results]
); ?>

</div>
