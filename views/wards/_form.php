<?php

use yii\helpers\Html;
use app\models\States;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Ward */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ward-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'state_id')->dropDownList(
            ArrayHelper::map(
                States::find()->orderby('state_name')->all(),
                'state_id' ,
                'state_name'
            ),
            [
                'prompt' => 'Select state',
                'onchange' => '
                $.post("/results/state?id="+$(this).val(), function(data){
                    $("select#ward-lga_id").html(data);
                });'
            ]
    ) ?>
    <?=  $form->field($model,'lga_id')->dropDownList(
        [],
        [
            'prompt' => 'Select LGA',
        ]
        )->label("LGA")?>

    <?= $form->field($model, 'ward_id')->textInput() ?>

    <?= $form->field($model, 'ward_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ward_description')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
