<?php

use yii\db\Schema;
use yii\db\Migration;

class m151130_074001_create_table_event_registration extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('event_registration', [
            'id'=>Schema::TYPE_PK,
            'prefix'=>Schema::TYPE_STRING.' NULL',
            'name'=>Schema::TYPE_STRING.' NOT NULL',
            'phone'=>Schema::TYPE_STRING.' NOT NULL',
            'email'=>Schema::TYPE_STRING.' NOT NULL',
            'address'=>Schema::TYPE_TEXT.' NULL',
            'registered_by'=>Schema::TYPE_BOOLEAN.' NOT NULL',
            'job_title'=>Schema::TYPE_STRING,
            'company'=>Schema::TYPE_STRING,
            'company_address'=>Schema::TYPE_TEXT,
            'city'=>Schema::TYPE_STRING,
            'postal_code'=>Schema::TYPE_STRING,
            'company_phone'=>Schema::TYPE_STRING,
            'company_fax'=>Schema::TYPE_STRING,
            'approved_by'=>Schema::TYPE_STRING,
            'designation'=>Schema::TYPE_STRING,
            'status'=>Schema::TYPE_INTEGER.' NOT NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME,
        ], $tableOptions);

    }

    public function down()
    {
        echo "m151130_074001_create_table_event_registration cannot be reverted.\n";

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
