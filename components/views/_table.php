
<h3 class="text-center">Polling Unit Result </h3>
<div class="" style="background-color: whitesmoke; border-radius: 10px; padding: 10px; margin-bottom: 20px; margin-top: 2px">
    <table class="table">
        <thead>
            <th>
                Party
            </th>
            <th>
                Score
            </th>
        </thead>
        <tbody>
                <?php
        
    use yii\helpers\Html;
    foreach($models as $model){ ?>
            <tr>
                <td>
                    <?= Html::encode($model->party_abbreviation) ?>
                </td>
                <td>
                    <?= Html::encode($model->party_score) ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
