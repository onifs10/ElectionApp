<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[AnnouncedPuResults]].
 *
 * @see AnnouncedPuResults
 */
class AnnouncedPuResultsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AnnouncedPuResults[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AnnouncedPuResults|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
