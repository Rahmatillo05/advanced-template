<?php

namespace common\repositories;

use common\models\LoginForm;
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
}