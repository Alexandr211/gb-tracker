<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $task_name
 * @property int $status
 * @property string $description
 * @property string $status_name
 * @property string $date_creation
 * @property string $date_update
 * @property string $finish_date
 * @property string $implementer_name
 * @property int $implementer
 * @property int $creator
 * @property int plan_id
 * @property int project_id
 * @property User $creator0
 * @property User $implementer0
 * @property Status $status0
 * @property Plan $plan_id0
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_name', 'status_name', 'description', 'finish_date'], 'required'],
            [['status', 'plan_id', 'implementer', 'creator', 'project_id'], 'integer'],
            [['date_creation', 'date_update', 'finish_date', 'project_id'], 'safe'],
            [['task_name', 'description', 'status_name', 'implementer_name'], 'string', 'max' => 255],
            [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator' => 'id']],
            [['implementer'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['implementer' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status' => 'id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_name' => 'Task Name',
            'status' => 'Status',
            'status_name' => 'Work progress',
            'plan_id' => 'Plan Id',
            'implementer_name' => 'Implementer Name',
            'description' => 'Description of the Task',
            'date_creation' => 'Date Creation',
            'date_update' => 'Date Update',
            'finish_date' => 'Finish Date and Time',
            'implementer' => 'Implementer',
            'creator' => 'Creator',
        ];
    }

    /** вызывается автоматически перед сохранением данных в базу
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert) {
        if(!parent::beforeSave($insert)) {
            return false;
        }
        //проверяем, что запись новая и присваиваем создателя
        if($insert) {
            $this->implementer = Yii::$app->user->id;
            $this->creator = Yii::$app->user->id;
                    }
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator0()
    {
        return $this->hasOne(User::className(), ['id' => 'creator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImplementer0()
    {
        return $this->hasOne(User::className(), ['id' => 'implementer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan_id0()
    {
        return $this->hasOne(Plan::className(), ['id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getProject_id0()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }


    /**
     * {@inheritdoc}
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskQuery(get_called_class());
    }



}
