<?php
/* @var $this yii\web\View */

use app\models\Lga;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


$this->title = 'Lgas Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Select Lga</p>
<div class="lga-form">
<?php $form = ActiveForm::begin()?>
<?= $form->field($model , 'lga[]')->checkboxList(
    ArrayHelper::map(Lga::find()->all(),'lga_id','lga_name')) ?>

<div class="form-group">
        <?= Html::submitButton('Get Results', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>

</div>