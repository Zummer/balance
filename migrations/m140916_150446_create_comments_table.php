yii<?php

use yii\db\Schema;
use yii\db\Migration;

class m140916_150446_create_comments_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%comments}}');
    }
}
