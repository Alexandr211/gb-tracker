<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SigninHistory]].
 *
 * @see SigninHistory
 */
class SigninHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SigninHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SigninHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
