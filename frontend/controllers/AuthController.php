<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\repositories\AuthRepository;
use yii\base\Exception;
use yii\rest\Controller;
use yii\web\MethodNotAllowedHttpException;
use yii\web\Request;

class AuthController extends Controller
{
    public AuthRepository $repository;
    public function init(): void
    {
        parent::init();
        $this->repository = new AuthRepository();
    }

    /**
     * @throws MethodNotAllowedHttpException|Exception
     */
    public function actionLogin(Request $request): bool|array
    {
        if (!$request->isPost) {
            throw new MethodNotAllowedHttpException();
        }
        return $this->repository->login($request);
    }
}