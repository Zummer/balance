yii<?php

use yii\db\Schema;
use yii\db\Migration;

class m140916_150445_create_users_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'balance' => $this->decimal(10,2),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
