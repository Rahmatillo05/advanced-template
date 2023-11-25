<?php

namespace common\models;

use common\helpers\Auth;
use common\repositories\UserRepository;
use Yii;
use yii\base\Exception;
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

    private $_user;

    public string $platform = 'front';



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

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword(string $attribute, array $params): void
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return array|false the user whether the user is logged in successfully
     * @throws Exception
     */
    public function login(): bool|array
    {
        if ($this->validate()) {
            $repository = new UserRepository($this->_user);
            return [
                'user' => $this->_user,
                'token' => $repository->generateToken($this->_user),
            ];
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser(): ?User
    {
        if ($this->_user === null) {
            $this->_user = Auth::findByUsername($this->username);
        }

        return $this->_user;
    }
}
