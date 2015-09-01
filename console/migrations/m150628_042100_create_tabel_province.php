<?php

use yii\db\Schema;
use yii\db\Migration;

class m150628_042100_create_tabel_province extends Migration
{
    public function up()
    {
        $this->createTable('province', [
            'id'=>Schema::TYPE_PK,
            'name'=>Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    public function down()
    {
        echo "m150628_042100_create_tabel_province cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
