<?php

namespace common\repositories\interfaces;

use mhndev\yii2Repository\Interfaces\iRepository;

interface iUserRepository extends iRepository
{
    public function generateToken();

    public function getUserByToken(string $token);

}