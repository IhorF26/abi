<?php

use yii\db\Migration;

class m170912_151129_worker extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%worker}}', [
            'id' => $this->primaryKey(),
            'num_kadrow' => $this->integer(11)->notNull(),
            'name' => $this->string(32)->notNull(),
            'surname' => $this->string(32)->notNull(),
            'position' => $this->string(50)->Null(),
            'typ_contract' => $this->integer(3)->notNull(),
            'id_profil' => $this->integer(3)->notNull(),
            'id_firma' => $this->integer(3)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%worker}}');
    }
}
