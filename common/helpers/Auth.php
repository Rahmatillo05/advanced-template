<?php

namespace common\helpers;

use common\models\User;
use Yii;
use yii\web\IdentityInterface;

class Auth extends User
{
    public static function user(): User|IdentityInterface|null
    {
        if (!Yii::$app->user->isGuest) {
            return parent::findIdentity(Yii::$app->user->id);
        }
        return null;
    }

    public static function id(): int|null
    {
        if (!Yii::$app->user->isGuest) {
            return (int)Yii::$app->user->id;
        }
        return null;
    }

    public static function isGuest(): bool
    {
        return Yii::$app->user->isGuest;
    }

    public static function findByUsername(string $username): ?User
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
}