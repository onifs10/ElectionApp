<?php

use app\models\Party;
use yii\helpers\Html;
use app\models\States;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\PollingUnit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="polling-unit-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'polling_unit_id')->textInput() ?>
     <!-- <?= $form->field($model, 'lga_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'uniquewardid')->textInput() ?> -->

    <?= $form->field($model, 'polling_unit_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'polling_unit_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'polling_unit_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'long')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'entered_by_user')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'date_entered')->textInput() ?> -->

    <!-- <?= $form->field($model, 'user_ip_address')->textInput(['maxlength' => true]) ?> -->

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-list"></i> Results</h4></div>
        <div class="panel-body">
        <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => $count, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsResult[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'full_name',
                    'address_line1',
                    'address_line2',
                    'city',
                    'state',
                    'postal_code',
                ],
            ]); ?>
          <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsResult as $i => $result): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Result</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                    <?php 
                      if (! $result->isNewRecord) {
                        echo Html::activeHiddenInput($result, "[{$i}]result_id");
                    }
                    ?>
                    <?= $form->field($result, "[{$i}]party_abbreviation")->dropDownList(
                        ArrayHelper::map(
                            Party::find()->all(),'partyid','partyname'),
                            [
                                'prompt' => 'Select Party',
                            
                            ]
                        )->label('Party');
                    ?>
                        <?= $form->field($result, "[{$i}]party_score")->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
