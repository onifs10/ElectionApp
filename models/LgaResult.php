<?php

namespace app\models;

use Yii;
use yii\base\Model;


class LgaResult extends Model
{
   public $lga; 

  /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['lga', 'required']
        ];
    }

    public function getResults()
    {
        $model = Lga::find()->with('state')->where(['lga_id' => $this->lga]);
        return $model;
    }
}