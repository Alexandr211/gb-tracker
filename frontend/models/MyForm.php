<?php
namespace frontend\models;

use yii\base\Model;

class MyForm extends Model {
    
    public $first_name;
    public $last_name;
    public $email;
    
    public function rules() {
        return [
            [['first_name', 'last_name', 'email'], 'required'],
        ];
    }
    public function Apply() {
        return true;
    }
}