<?php

use yii\db\Migration;

/**
 * Handles the creation of table `status`.
 */
class m181225_100242_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('status', [
            'id' => $this->primaryKey(),
            'status_name' => $this->string(),
        ]);
        $this->insert('status', [
            'status_name' => 'start',
        ]);
        $this->insert('status', [
            'status_name' => 'medium',
        ]);
        $this->insert('status', [
            'status_name' => 'finish',
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('status');
    }
}
