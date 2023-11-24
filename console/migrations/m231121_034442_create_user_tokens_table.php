<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_tokens}}`.
 */
class m231121_034442_create_user_tokens_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_tokens}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'token' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'expired_at' => $this->integer(),
            'is_deleted' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer()
        ]);
        $this->createIndex(
            'idx-user_tokens-user_id',
            '{{%user_tokens}}',
            'user_id'
        );
        $this->addForeignKey(
            'fk-user_tokens-user_id',
            '{{%user_tokens}}',
            'user_id',
            '{{%user}}',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user_tokens-user_id',
            '{{%user_tokens}}'
        );
        $this->dropIndex(
            'idx-user_tokens-user_id',
            '{{%user_tokens}}'
        );
        $this->dropTable('{{%user_tokens}}');
    }
}
