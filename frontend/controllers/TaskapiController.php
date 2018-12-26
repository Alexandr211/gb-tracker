<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.12.18
 * Time: 12:11
 */

namespace frontend\controllers;

use \common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use \common\models\Task;


class TaskapiController extends ActiveController
{

  /**  This is a HttpBasicAuth that provides authorization by sending path <index.php>, request parameters <r=taskapi> and headers <Authorization: Basic base64_encode(username:password)>
       Use it in conjunction with HTTPS to provide confidentiality!
  **/

    public function behaviors()
    {
      $behaviors = parent::behaviors();
      $behaviors['authenticator'] = [
          'class' => HttpBasicAuth::className(),
          'auth' => function ($username, $password) {
                $user = User::findByUsername($username);
                  if($user->validatePassword($password)) {
                    return $user;
                                }
                      return null;
                                  }

    ];
      return $behaviors;
  }


    /** actions is configured to return only authorized User's Tasks data! **/

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function () {
            return new ActiveDataProvider([
                'query' => Task::find()->select('id, task_name, status_name, description, project_id')->where(['creator' => \Yii::$app->user->id]),
            ]);
        };


        return $actions;


    }

    public $modelClass = 'frontend\models\Taskapi';


}