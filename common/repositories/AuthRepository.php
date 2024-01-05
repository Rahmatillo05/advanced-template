<?php

namespace common\repositories;

use common\models\LoginForm;
use common\models\SignUpForm;
use common\models\User;
use yii\base\Exception;
use yii\web\Request;

class AuthRepository
{
    /**
     * @throws Exception
     */
    public function login(Request $request, string $platform = 'front')
    {
        $model = new LoginForm();
        $model->load($request->post(), '');
        return $model->login();
    }

    public function signup(Request $request): User|bool|array
    {
        $model = new SignUpForm();
        $model->load($request->post(), '');
        if ($model->validate()) {
            $user = new User();
            $user->username = $model->username;
            $user->email = $model->email;
            $user->phone = $model->phone;
            $user->setPassword($model->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }
        return $model->errors ?? false;
    }

    private function sendConfirmationCode()
    {

    }

    private function validateCode()
    {

    }

}