<?php

namespace frontend\controllers;

use yii\rest\Controller;

class ApiController extends Controller
{

    public function actionIndex()
    {
        return [
            'status' => env('DSN'),
            'message' => 'Welcome to API!'
        ];
    }

}