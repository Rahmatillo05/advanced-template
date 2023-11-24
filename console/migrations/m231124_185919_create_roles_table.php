<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%roles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m231124_185919_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%roles}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'role' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
            'is_deleted' => $this->smallInteger()->defaultValue(0),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-roles-user_id}}',
            '{{%roles}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-roles-user_id}}',
            '{{%roles}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-roles-user_id}}',
            '{{%roles}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-roles-user_id}}',
            '{{%roles}}'
        );

        $this->dropTable('{{%roles}}');
    }
}
