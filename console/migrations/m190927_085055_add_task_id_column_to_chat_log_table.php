<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%chat_log}}`.
 */
class m190927_085055_add_task_id_column_to_chat_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('chat_log', 'task_id', $this->integer());
        $this->addForeignKey(
            'fk_chat_log_task_id',
            'chat_log',
            'task_id',
            'project',
            'id',
            'RESTRICT',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_chat_log_task_id', 'chat_log');
        $this->dropColumn('chat_log', 'task_id');
    }
}
