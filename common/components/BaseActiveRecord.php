<?php

namespace common\components;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

class BaseActiveRecord extends ActiveRecord
{

    public function behaviors(): array
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::class,
            ],
            'softDeleteBehavior' => [
                'class' => SoftDeleteBehavior::class,
                'softDeleteAttributeValues' => [
                    'isDeleted' => true
                ],
                'replaceRegularDelete' => true
            ]
        ];
    }

    public static function find(): ActiveQuery
    {
        return parent::find()->where(['is_deleted' => null]);
    }

}