<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\repositories\AuthRepository;
use yii\rest\Controller;
use yii\web\MethodNotAllowedHttpException;
use yii\web\Request;

class AuthController extends Controller
{
    public AuthRepository $repository;
    public function init()
    {
        parent::init();
        $this->repository = new AuthRepository();
    }

    /**
     * @throws MethodNotAllowedHttpException
     */
    public function actionLogin(Request $request)
    {
        if (!$request->isPost) {
            throw new \yii\web\MethodNotAllowedHttpException();
        }
        return $this->repository->login($request);
    }
}