<?php

namespace frontend\controllers;

use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;

class CoreController extends ActiveController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * @return array|array[]
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::class,

        ];
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'except' => [
                'index',
                'view'
            ],
        ];


        return $behaviors;
    }
}