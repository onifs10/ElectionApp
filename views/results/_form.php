<?php

use app\models\Party;
use app\models\States;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnnouncedPuResults */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="announced-pu-results-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'state')->dropDownList(
            ArrayHelper::map(
                States::find()->orderby('state_name')->all(),
                'state_id' ,
                'state_name'
            ),
            [
                'prompt' => 'Select state',
                'onchange' => '
                $.post("state?id="+$(this).val(), function(data){
                    $("select#announcedpuresults-lga").html(data);
                });'
            ]
    ) ?>
    <?=  $form->field($model,'lga')->dropDownList(
        [],
        [
            'prompt' => 'Select LGA',
            'onchange' => '
            $.post("lga?id="+$(this).val(), function(data){
                $("select#announcedpuresults-ward").html(data);
            });'
        ]
        )?>
     <?=  $form->field($model,'ward')->dropDownList(
        [],
        [
            'prompt' => 'Select Ward',
            'onchange' => '
            $.post("polling?id="+$(this).val(), function(data){
                $("select#announcedpuresults-polling_unit_uniqueid").html(data);
            });'
        ]
        )?>
    <?= $form->field($model, 'polling_unit_uniqueid')->dropDownList(
        [],
        [
            'prompt' => 'Select PollingUnit',
        ]
    ) ?>
    <?= $form->field($model, 'party_abbreviation')->dropDownList(
        ArrayHelper::map(
            Party::find()->all(),'partyid','partyname'),
            [
                'prompt' => 'Select Party',
            
            ]
        )->label('Party');
      ?>

    <?= $form->field($model, 'party_score')->textInput() ?>

    <?= $form->field($model, 'entered_by_user')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
