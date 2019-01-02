<?php

use yii\db\Migration;

/**
 * Handles the creation of table `plan`.
 */
class m181225_094150_create_plan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('plan', [
            'id' => $this->primaryKey(),
            'status_plan' => $this->string(),
        ]);
        $this->insert('plan', [
            'status_plan' => 'On the go',
        ]);
        $this->insert('plan', [
            'status_plan' => 'Expired',
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('plan');
    }
}
