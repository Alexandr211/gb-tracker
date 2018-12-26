<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property int $id
 * @property string $status_plan
 *
 * @property Task[] $tasks
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_plan'], 'required'],
            [['status_plan'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_plan' => 'Status Plan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['plan_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlanQuery(get_called_class());
    }
}
