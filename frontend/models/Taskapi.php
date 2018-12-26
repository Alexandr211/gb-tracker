<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.12.18
 * Time: 13:24
 */

namespace frontend\models;


class Taskapi extends \common\models\Task
{
    public function getPrimaryKey($asArray = false)
    {
        return $asArray ? ["id"] : "id";
    }


    /**
     * @return array|false
     */
    public function fields()
    {
        return [
            'creator' => function() {
                return $this->creator;
            },
            'task name' => function() {
                return $this->task_name;
            },
            'status name' => function() {
                return $this->status_name;
            },
            'description' => function() {
                return $this->description;
            },

        ];
    }




}