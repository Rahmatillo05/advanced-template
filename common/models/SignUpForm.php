<?php

namespace common\models;

use yii\base\Model;

class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
        ];
    }
}