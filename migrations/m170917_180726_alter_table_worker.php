<?php

use yii\db\Migration;

class m170917_180726_alter_table_worker extends Migration
{
    public function up()
    {
        $this->alterColumn('worker','date_birthday', 'DATE NULL');
    }
}
