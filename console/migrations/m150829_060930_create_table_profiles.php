<?php

use yii\db\Schema;
use yii\db\Migration;

class m150829_060930_create_table_profiles extends Migration
{
    public function up()
    {
        $this->createTable('profile', [
            'id'=>Schema::TYPE_PK,
            'user_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'first_name'=>Schema::TYPE_STRING.' NOT NULL',
            'middle_name'=>Schema::TYPE_STRING.' NULL',
            'surname'=>Schema::TYPE_STRING.' NULL',
            'display_surname_preference'=>Schema::TYPE_INTEGER.' NOT NULL',
            'suffix'=>Schema::TYPE_STRING.' NULL',
            'gender_id'=>Schema::TYPE_INTEGER.' NOT NULL',
            'dob'=>Schema::TYPE_DATE.' NULL',
            'pob'=>Schema::TYPE_STRING.' NULL',
            'job'=>Schema::TYPE_STRING.' NULL',
            'street1'=>Schema::TYPE_TEXT.' NULL',
            'street2'=>Schema::TYPE_TEXT.' NULL',
            'city'=>Schema::TYPE_TEXT.' NULL',
            'province_id'=>Schema::TYPE_INTEGER.' NULL',
            'country_id'=>Schema::TYPE_INTEGER.' NULL',
            'postal_code'=>Schema::TYPE_TEXT.' NULL',
            'status'=>Schema::TYPE_INTEGER.' NOT NULL',
            'photo'=>Schema::TYPE_STRING.' NULL',
            'created'=>Schema::TYPE_DATETIME,
            'updated'=>Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        echo "m150829_060930_create_table_profiles cannot be reverted.\n";

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
