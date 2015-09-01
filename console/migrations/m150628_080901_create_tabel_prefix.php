<?php

use yii\db\Schema;
use yii\db\Migration;

class m150628_080901_create_tabel_prefix extends Migration
{
    public function up()
    {
        $this->createTable('prefix', [
            'id'=>Schema::TYPE_PK,
            'name'=>Schema::TYPE_STRING.' NOT NULL',
        ]);
    }

    public function down()
    {
        echo "m150628_080901_create_tabel_prefix cannot be reverted.\n";

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
