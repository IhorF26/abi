<?php

use yii\db\Migration;

class m170914_153011_add_column_to_worker_table extends Migration
{
    public function up()
    {

        $this->dropColumn('worker', 'zbir_id');

        $this->addColumn('worker', 'konfigurator_id',
            $this->integer(3)->after('id') );

    }

    public function down()
    {

        $this->dropColumn('worker', 'konfigurator_id');

        $this->addColumn('worker', 'zbir_id',
            $this->integer(3)->after('id') );

        return false;
    }
}
