<?php

use yii\db\Schema;
use yii\db\Migration;

class m150901_015650_add_foreignkey_to_user_table extends Migration
{
    public function up()
    {
        $this->addForeignKey('fk_profile_user_id', 'profile', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m150901_015650_add_foreignkey_to_user_table cannot be reverted.\n";

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
