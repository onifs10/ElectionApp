<?php 
namespace app\components;

use yii\base\Widget;

class ResultTableWidget extends Widget
{
    public $models;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('_table', ['models' => $this->models]);
    }
}