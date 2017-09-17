<?php

use yii\db\Migration;

class m170917_083817_change_to_colum_worker extends Migration
{
    public function up()
    {
        $this->dropColumn('worker', 'typ_contract');

        $this->addColumn('worker', 'typ_contract',
            $this->integer(3)->after('position')->Null() );
    }
}
