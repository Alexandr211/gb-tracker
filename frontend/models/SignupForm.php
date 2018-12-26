<?php
namespace frontend\models;
use Yii;
use yii\base\Model;
use common\models\User;
//use frontend\models\RbacSignupForm;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save(false);

        // нужно добавить следующие три строки:
    //    $auth = Yii::$app->authManager;
    //    $authorRole = $auth->getRole('author');
    //    $auth->assign($authorRole, $user->getId());
        
        $id = $user->getId();
     //   var_dump($id);
        
        $this->assignuser($id);
     //   $assign = new RbacSignupForm();
     //   $assign->assignuser($id);
        
        return $user ? $user : null;
    }
    
    public function assignuser($id) {
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
      //  var_dump($id);
      //  var_dump($authorRole);
        if(!$id == null) {
         $auth->assign($authorRole, $id);
            return true;   
        }
        else {
            
            return false;
        }
        
        
     
        
    }
}
