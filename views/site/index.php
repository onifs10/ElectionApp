<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index" style="margin-top: -30px;">

    <div class="jumbotron">
        <h1>Election App</h1>

        <p class="lead">Adding Election result </p>

        <div style="margin-top: 10px;">
            <?= Html::a('Add new States',['/states/create'],['class' => 'btn btn-success']) ?>
        </div>
        <div style="margin-top: 10px;">
            <?= Html::a('Add new Lga',['/lga/create'],['class' => 'btn btn-success']) ?>
        </div>
        <div style="margin-top: 10px;">
            <?= Html::a('Add new ward',['/wards/create'],['class' => 'btn btn-success']) ?>
        </div>
        <div style="margin-top: 10px;">
            <?= Html::a('Add new Polling Unit',['/polling-unit/create'],['class' => 'btn btn-success']) ?>
        </div>
        <div style="margin-top: 10px;">
            <?= Html::a('Add new Result',['/results/create'],['class' => 'btn btn-success']) ?>
        </div>
        <div style="margin-top: 10px;">
            <?= Html::a('Add new Party',['/party/create'],['class' => 'btn btn-success']) ?>
        </div>
        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>


</div>
