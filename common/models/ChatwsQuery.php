<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Chatws]].
 *
 * @see Chatws
 */
class ChatwsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Chatws[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Chatws|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
