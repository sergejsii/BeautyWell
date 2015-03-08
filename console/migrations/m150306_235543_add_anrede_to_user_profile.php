<?php

use yii\db\Schema;
use yii\db\Migration;

class m150306_235543_add_anrede_to_user_profile extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%profile}}','anrede',Schema::TYPE_STRING.' NOT NULL');

    }

    public function safeDown()
    {

        $this->dropColumn('{{%profile}}','anrede');

        return false;
    }

}
