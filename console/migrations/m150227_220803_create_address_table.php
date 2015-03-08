<?php

use yii\db\Schema;
use yii\db\Migration;

class m150227_220803_create_address_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_address}}', [
            'user_id' => Schema::TYPE_PK,
            'strasse' => Schema::TYPE_STRING . ' NOT NULL',
            'ort' =>   ' NOT NULL',
            'plz' => Schema::TYPE_INTEGER . ' NOT NULL',
            'land' => Schema::TYPE_STRING,
            'lng' => Schema::TYPE_STRING . ' NOT NULL',
            'lat' => Schema::TYPE_STRING . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('user_address_fk','{{%user_address}}','user_id','{{%user}}','id','cascade','cascade');

    }

    public function down()
    {
       $this->dropTable('{{%user_address}}');

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
