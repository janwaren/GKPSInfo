<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Distrik]].
 *
 * @see Distrik
 */
class DistrikQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('level_jemaat_id=1');
    }

    /**
     * @inheritdoc
     * @return Distrik[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Distrik|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
