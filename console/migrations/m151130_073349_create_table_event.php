<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_073349_create_table_event extends Migration
{
    public function up()
    {
        $this->createTable('event', [
            'id'=>Schema::TYPE_PK,
            'name'=>Schema::TYPE_STRING.' NOT NULL',
            'description'=>Schema::TYPE_TEXT.' NULL',
            'note'=>Schema::TYPE_TEXT.' NULL',
            'datetime'=>Schema::TYPE_DATETIME.' NOT NULL',
            'venue'=>Schema::TYPE_STRING.' NOT NULL',
            'address'=>Schema::TYPE_TEXT.' NOT NULL',
            'file'=>Schema::TYPE_STRING.' NULL',
            'image'=>Schema::TYPE_STRING.' NOT NULL',
            'published'=>Schema::TYPE_BOOLEAN.' NOT NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        echo "m151130_073349_create_table_event cannot be reverted.\n";

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
