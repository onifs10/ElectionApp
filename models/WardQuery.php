<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ward]].
 *
 * @see Ward
 */
class WardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Ward[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Ward|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
