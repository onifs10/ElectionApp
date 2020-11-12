<?php 
namespace app\components;

use yii\base\Widget;

class ResultTable2Widget extends Widget
{
    public $models;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('_table2', ['models' => $this->models]);
    }
}