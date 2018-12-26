<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use common\models\User;
//use yii\web\User;




/**
 * Login form
 */
class RbacSignupForm extends Model
{
    public function assignuser($id) {
         $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
      //  var_dump($id);
      //  var_dump($authorRole);
        $auth->assign($authorRole, $id);
        
    }
    
    public function test() {
        
       return true; 
    }
}