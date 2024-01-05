<?php

namespace common\models;

use yii\base\Model;

class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone;

    public function rules(): array
    {
        return [
            [['username', 'email', 'password', 'phone'], 'required'],
            ['email', 'email'],
            [['email'], 'unique', 'targetClass' => User::class, 'targetAttribute' => ['email']],
            [['username'], 'unique', 'targetClass' => User::class, 'targetAttribute' => ['username']],
            [['phone'], 'unique', 'targetClass' => User::class, 'targetAttribute' => ['phone']],
        ];
    }
}