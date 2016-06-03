<?php

use yii\db\Migration;

class m160524_084938_create_transferlog_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%transferlog}}', [
            'id' => $this->primaryKey(),
            'user_from_id' => $this->integer()->notNull(),
            'user_to_id' => $this->integer()->notNull(),
            'sum' => $this->decimal(10,2)->notNull(),
            'date' => $this->dateTime()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%transferlog}}');
    }
}
