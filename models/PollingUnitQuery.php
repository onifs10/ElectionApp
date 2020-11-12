<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PollingUnit]].
 *
 * @see PollingUnit
 */
class PollingUnitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PollingUnit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PollingUnit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
