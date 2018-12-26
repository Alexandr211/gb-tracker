<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $project_name
 * @property int $id_user
 * @property int $id_project_status
 * @property string $project_status
 * @property string $project_creator
 * @property User $user
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_name', 'project_status'], 'required'],
            [['id_user', 'id_project_status'], 'integer'],
            [['project_name', 'project_status', 'project_creator'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_name' => 'Project Name',
            'id_user' => 'Id User',
            'id_project_status' => 'Id Project Status',
            'project_status' => 'Project Status',
            'project_creator' => 'Project Creator'
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
         //   var_dump(Yii::$app->user->id);
            $this->id_user = Yii::$app->user->id;
            $this->project_creator = Yii::$app->user->identity->username;
            switch ($this->project_status) {
                case "start":
                    $this->id_project_status = 1;
                    break;
                case "medium":
                    $this->id_project_status = 2;
                    break;
                case "finish":
                    $this->id_project_status = 3;
                    break;
            }

        }
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'id']);
    }
}
