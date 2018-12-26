<?php
namespace frontend\tests\unit\models;

use Yii;
use common\fixtures\UserFixture;
//use frontend\models\RbacSignupForm;
use frontend\models\SignupForm;

class RbacSignupFormTest extends \Codeception\Test\Unit
{
     /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }
  
    public function testCorrectAssignuser() {
        $model = new SignupForm([
            'username' => 'some_username',
            'email' => 'some_email@example.com',
            'password' => 'some_password',
            ]);
        $id = $model->signup()->id;
        expect($model->assignuser($id))->true();
    }
    
    
    
    public function testNotCorrectAssignuser() 
    {
     //   $model = new SignupForm();
     //   expect_not($model->assignuser());
      //  expect_that($model->getErrors('id'));
      //  expect_that($model->getErrors('authorRole'));
        
    }
}