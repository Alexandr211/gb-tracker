<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        
        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // добавляем разрешение "UpdateAdmin"
        $UpdateAdmin = $auth->createPermission('UpdateAdmin');
        $UpdateAdmin->description = 'UpdateAdmin';
        $auth->add($UpdateAdmin);

        // add the rule
        $rule = new \frontend\rbac\AuthorRule;
        $auth->add($rule);
        // добавляем разрешение "UpdateTask" и привязываем к нему правило.
        $UpdateTask = $auth->createPermission('UpdateTask');
        $UpdateTask->description = 'UpdateTask';
        $UpdateTask->ruleName = $rule->name;
        $auth->add($UpdateTask);

        // add the rule
        $rule = new \frontend\rbac\CreatorRule;
        $auth->add($rule);
        // добавляем разрешение "UpdateProject" и привязываем к нему правило.
        $UpdateProject = $auth->createPermission('UpdateProject');
        $UpdateProject->description = 'UpdateProject';
        $UpdateProject->ruleName = $rule->name;
        $auth->add($UpdateProject);

        // добавляем разрешение "UpdateTask" и привязываем к нему правило.

        // "UpdateTask" and "UpdateProject" будет использоваться из "UpdateAdmin"
        $auth->addChild($UpdateTask, $UpdateAdmin);
        $auth->addChild($UpdateProject, $UpdateAdmin);



        // добавляем роль "admin" и даём роли разрешение "updatePost"
        // а также все разрешения роли "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $UpdateAdmin);
     //   $auth->addChild($admin, $author);
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $UpdateTask);
        $auth->addChild($author, $UpdateProject);

        // Назначение ролей пользователям. 1 и 2 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($admin, 1);



        
    }
}

?>