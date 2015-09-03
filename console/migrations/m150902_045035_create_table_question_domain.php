<?php

use yii\db\Schema;
use yii\db\Migration;

class m150902_045035_create_table_question_domain extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('question_domain', [
            'id'=>Schema::TYPE_PK,
            'question_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'domain_id'=>Schema::TYPE_INTEGER.' NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('fk_question_domain_question_id', 'question_domain', 'question_id', 'question', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_question_domain_domain_id', 'question_domain', 'domain_id', 'domain', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150902_045035_create_table_question_domain cannot be reverted.\n";

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
