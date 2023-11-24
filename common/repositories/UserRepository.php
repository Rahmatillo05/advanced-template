<?php

namespace common\repositories;

use common\components\BaseRepository;
use common\models\User;
use common\models\UserTokens;
use common\repositories\interfaces\iUserRepository;
use yii\base\Exception;

class UserRepository extends BaseRepository implements iUserRepository
{

    /**
     * @throws Exception
     */
    public function generateToken(User $user): ?string
    {
        $user_token = UserTokens::find()
            ->where(['user_id' => $user->id, 'status' => UserTokens::STATUS_ACTIVE])
            ->orderBy(['created_at' => SORT_DESC])
            ->one();
        /**
         * @var UserTokens $user_token 
         */
        if ($user_token) {
            $user_token->status = UserTokens::STATUS_DELETED;
            $user_token->save();
        }
        $user_token = new UserTokens();
        $user_token->user_id = $user->id;
        $user_token->token = \Yii::$app->security->generateRandomString();
        $user_token->status = UserTokens::STATUS_ACTIVE;
        $user->save();

        return $user_token->token;
    }

    public function getUserByToken(string $token): ?User
    {
        $token = UserTokens::findOne(['token' => $token, 'status' => UserTokens::STATUS_ACTIVE]);
        return $token?->user;
    }

    public function login()
    {
        
    }
}