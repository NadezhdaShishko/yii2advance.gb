<?php

use yii\db\Migration;

/**
 * Class m190927_085443_alter_created_id_column_to_chat_log_table
 */
class m190927_085443_alter_created_id_column_to_chat_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('chat_log', 'created_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('chat_log', 'created_at', $this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190927_085443_alter_created_id_column_to_chat_log_table cannot be reverted.\n";

        return false;
    }
    */
}
