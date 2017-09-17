<?php

use yii\db\Migration;

class m170917_164648_alter_table_zbir_pol extends Migration
{

    public function up()
    {
      $this->alterColumn('zbir_pol','status', 'BOOLEAN NOT NULL DEFAULT 0');
    }

}
