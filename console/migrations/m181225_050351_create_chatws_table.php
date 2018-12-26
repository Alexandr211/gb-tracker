<?php

use yii\db\Migration;

/**
 * Handles the creation of table `chatws`.
 */
class m181225_050351_create_chatws_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('chatws', [
            'id' => $this->primaryKey(),
            'msg' => $this->string(),
            'taskId' => $this->integer(),
            'username' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('chatws');
    }
}
