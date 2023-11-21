<?php

namespace frontend\controllers;

use common\components\ResponseHelper;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function actionIndex(): array
    {
        return ResponseHelper::success('Welcome to API!');
    }

}