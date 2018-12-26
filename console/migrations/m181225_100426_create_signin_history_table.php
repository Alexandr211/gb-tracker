<?php

use yii\db\Migration;

/**
 * Handles the creation of table `signin_history`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m181225_100426_create_signin_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('signin_history', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string()->defaultValue(NULL),
            'date_time' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-signin_history-user_id',
            'signin_history',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-signin_history-user_id',
            'signin_history',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-signin_history-user_id',
            'signin_history'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-signin_history-user_id',
            'signin_history'
        );

        $this->dropTable('signin_history');
    }
}
