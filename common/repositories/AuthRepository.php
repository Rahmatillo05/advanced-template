<?php

namespace common\repositories;

use common\models\LoginForm;
use yii\web\Request;

class AuthRepository
{
    public function login(Request $request, string $platform = 'front')
    {
        $model = new LoginForm();
        $model->load($request->post(), '');
        return $model->login();
    }
}