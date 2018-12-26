<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m181225_094830_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'project_name' => $this->string(),
            'id_user' => $this->integer(),
            'id_project_status' => $this->integer(),
            'project_status' => $this->string(),
            'project_creator' => $this->string(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            'idx-project-id_user',
            'project',
            'id_user'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-project-id_user',
            'project',
            'id_user',
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
            'fk-project-id_user',
            'project'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            'idx-project-id_user',
            'project'
        );

        $this->dropTable('project');
    }
}
