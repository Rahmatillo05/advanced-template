<?php

namespace common\repositories;

use common\components\BaseRepository;
use common\repositories\interfaces\iUserRepository;

class UserRepository extends BaseRepository implements iUserRepository
{

    public function generateToken()
    {
        // TODO: Implement generateToken() method.
    }

    public function getUserByToken(string $token)
    {
        // TODO: Implement getUserByToken() method.
    }
}