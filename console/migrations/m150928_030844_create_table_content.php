<?php

use yii\db\Schema;
use yii\db\Migration;

class m150928_030844_create_table_content extends Migration
{
    public function up()
    {
        $this->createTable('content',[
            'id'=>Schema::TYPE_PK,
            'title'=>Schema::TYPE_STRING.' NOT NULL',
            'content'=>Schema::TYPE_TEXT.' NULL',
            'image'=>Schema::TYPE_STRING.' NULL',
            'type'=>Schema::TYPE_INTEGER.' NOT NULL',
            'is_html'=>Schema::TYPE_BOOLEAN.' NOT NULL',
            'status'=>Schema::TYPE_BOOLEAN.' NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        echo "m150928_030844_create_table_content cannot be reverted.\n";

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
