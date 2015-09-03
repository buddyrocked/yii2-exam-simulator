<?php

use yii\db\Schema;
use yii\db\Migration;

class m150902_042412_create_table_domain extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

         $this->createTable('domain', [
            'id'=>Schema::TYPE_PK,
            'subject_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'name'=>Schema::TYPE_STRING.' NOT NULL',
            'percentage'=>Schema::TYPE_INTEGER.' NOT NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME,
        ], $tableOptions);



        $this->addForeignKey('fk_domain_subject_id', 'domain', 'subject_id', 'subject', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150902_042412_create_table_domain cannot be reverted.\n";

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
