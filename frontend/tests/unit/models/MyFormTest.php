<?php
namespace frontend\tests\unit\models;

use Yii;
use frontend\models\MyForm;

class MyFormTest extends \Codeception\Test\Unit
{
    public function testApplyCorrectDone() {
        $model = new MyForm();
        $model->attributes = [
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@test.com',
        ];
        expect($model->validate())->true();
        expect($model->Apply())->true();
    }
}