<?php

use yii\db\Migration;

/**
 * Class m190929_113857_update_fk_chat_log_task_id_to_chat_log_table
 */
class m190929_113857_update_fk_chat_log_task_id_to_chat_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_chat_log_task_id', 'chat_log');
        $this->addForeignKey(
            'fk_chat_log_task_id',
            'chat_log',
            'task_id',
            'task',
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
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190929_113857_update_fk_chat_log_task_id_to_chat_log_table cannot be reverted.\n";

        return false;
    }
    */
}
