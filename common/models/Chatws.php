<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chatws".
 *
 * @property int $id
 * @property string $msg
 * @property int $taskId
 * @property string $username
 */
class Chatws extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chatws';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['taskId', 'username'], 'required'],
            [['taskId'], 'integer'],
            [['msg', 'username'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'msg' => 'Msg',
            'taskId' => 'Task ID',
            'username' => 'Username',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ChatwsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChatwsQuery(get_called_class());
    }
}
