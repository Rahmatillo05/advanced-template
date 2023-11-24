<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 *
 * @property-read null|User $user
 */
class LoginForm extends Model
{
    public $username;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
}
