<?php

use yii\db\Schema;
use yii\db\Migration;

class m150307_000044_add_firma_to_user_profile extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%profile}}','firma',Schema::TYPE_STRING.' NOT NULL');

    }

    public function safeDown()
    {

        $this->dropColumn('{{%profile}}','firma');

        return false;
    }

}
