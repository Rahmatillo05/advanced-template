<?php

namespace common\models;

use common\components\BaseActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "user_tokens".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $token
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $expired_at
 * @property int|null $is_deleted
 * @property int|null $updated_at
 *
 * @property User $user
 */
class UserTokens extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user_tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'status', 'created_at', 'expired_at', 'is_deleted', 'updated_at'], 'integer'],
            [['token'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'token' => 'Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'expired_at' => 'Expired At',
            'is_deleted' => 'Is Deleted',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
