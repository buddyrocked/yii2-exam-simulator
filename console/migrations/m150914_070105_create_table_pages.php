<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_070105_create_table_pages extends Migration
{
    public function up()
    {
        $this->createTable('page', [
            'id'=>Schema::TYPE_PK,
            'title'=>Schema::TYPE_STRING.' NOT NULL',
            'slug'=>Schema::TYPE_STRING.'  NULL',
            'content'=>Schema::TYPE_TEXT.' NULL',
            'image'=>Schema::TYPE_STRING.' NULL',
            'type'=>Schema::TYPE_INTEGER.' NOT NULL',
            'is_html'=>Schema::TYPE_BOOLEAN.' NOT NULL',
            'status'=>Schema::TYPE_BOOLEAN.' NULL',
            'seo_title'=>Schema::TYPE_STRING.'  NULL',
            'seo_keyword'=>Schema::TYPE_STRING.'  NULL',
            'seo_description'=>Schema::TYPE_STRING.'  NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        echo "m150914_070105_create_table_pages cannot be reverted.\n";

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
