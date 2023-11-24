<?php

namespace common\repositories\interfaces;

use common\models\User;
use mhndev\yii2Repository\Interfaces\iRepository;

interface iUserRepository extends iRepository
{
    public function generateToken(User $user);

    public function getUserByToken(string $token);

}