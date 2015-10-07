<?php

use yii\db\Schema;
use yii\db\Migration;

class m151006_071358_create_table_simulation_domain extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('simulation_domain', [
            'id' => Schema::TYPE_PK,
            'simulation_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'domain_id' => Schema::TYPE_INTEGER.' NOT NULL'
        ], $tableOptions);

        $this->addForeignKey('fk_simulation_domain_simulation_id', 'simulation_domain', 'simulation_id', 'simulation', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_simulation_domain_simulation_domain_id', 'simulation_domain', 'domain_id', 'domain', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m151006_071358_create_table_simulation_domain cannot be reverted.\n";

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
