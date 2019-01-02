<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 * Has foreign keys to the tables:
 *
 * - `status`
 * - `plan`
 * - `implementer`
 * - `creator`
 * - `project`
 */
class m181225_103949_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'task_name' => $this->string(),
            'status' => $this->integer()->defaultValue(NULL),
            'status_name' => $this->string()->defaultValue(NULL),
            'plan_id' => $this->integer()->defaultValue(NULL),
            'implementer_name' => $this->string()->defaultValue(NULL),
            'description' => $this->string(),
            'date_creation' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'date_update' => $this->dateTime()->defaultValue(NULL)->append('ON UPDATE CURRENT_TIMESTAMP'),
            'finish_date' => $this->dateTime(),
            'implementer' => $this->integer(),
            'creator' => $this->integer(),
            'project_id' => $this->integer()->defaultValue(NULL),
        ]);

        // creates index for column `status`
        $this->createIndex(
            'idx-task-status',
            'task',
            'status'
        );

        // add foreign key for table `status`
        $this->addForeignKey(
            'fk-task-status',
            'task',
            'status',
            'status',
            'id',
            'CASCADE'
        );

        // creates index for column `plan_id`
        $this->createIndex(
            'idx-task-plan_id',
            'task',
            'plan_id'
        );

        // add foreign key for table `plan`
        $this->addForeignKey(
            'fk-task-plan_id',
            'task',
            'plan_id',
            'plan',
            'id',
            'CASCADE'
        );

        // creates index for column `implementer`
        $this->createIndex(
            'idx-task-implementer',
            'task',
            'implementer'
        );

        // add foreign key for table `implementer`
        $this->addForeignKey(
            'fk-task-implementer',
            'task',
            'implementer',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `creator`
        $this->createIndex(
            'idx-task-creator',
            'task',
            'creator'
        );

        // add foreign key for table `creator`
        $this->addForeignKey(
            'fk-task-creator',
            'task',
            'creator',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `project_id`
        $this->createIndex(
            'idx-task-project_id',
            'task',
            'project_id'
        );

        // add foreign key for table `project`
        $this->addForeignKey(
            'fk-task-project_id',
            'task',
            'project_id',
            'project',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `status`
        $this->dropForeignKey(
            'fk-task-status',
            'task'
        );

        // drops index for column `status`
        $this->dropIndex(
            'idx-task-status',
            'task'
        );

        // drops foreign key for table `plan`
        $this->dropForeignKey(
            'fk-task-plan_id',
            'task'
        );

        // drops index for column `plan_id`
        $this->dropIndex(
            'idx-task-plan_id',
            'task'
        );

        // drops foreign key for table `implementer`
        $this->dropForeignKey(
            'fk-task-implementer',
            'task'
        );

        // drops index for column `implementer`
        $this->dropIndex(
            'idx-task-implementer',
            'task'
        );

        // drops foreign key for table `creator`
        $this->dropForeignKey(
            'fk-task-creator',
            'task'
        );

        // drops index for column `creator`
        $this->dropIndex(
            'idx-task-creator',
            'task'
        );

        // drops foreign key for table `project`
        $this->dropForeignKey(
            'fk-task-project_id',
            'task'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            'idx-task-project_id',
            'task'
        );

        $this->dropTable('task');
    }
}
