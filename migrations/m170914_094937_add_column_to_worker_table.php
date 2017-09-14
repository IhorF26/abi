<?php

use yii\db\Migration;

class m170914_094937_add_column_to_worker_table extends Migration
{
    public function up()
    {
        $this->addColumn('worker', 'name2',
            $this->string(32)->after('name') );
        $this->addColumn('worker', 'PESEL',
            $this->integer(11)->after('surname') );
        $this->addColumn('worker', 'NIP',
            $this->integer(11)->after('PESEL') );
        $this->addColumn('worker', 'phone_number',
            $this->string(25)->after('NIP') );
        $this->addColumn('worker', 'street',
            $this->string(50)->after('phone_number') );
        $this->addColumn('worker', 'house_number',
            $this->string(10)->after('street') );
        $this->addColumn('worker', 'flat_number',
            $this->string(10)->after('house_number') );
        $this->addColumn('worker', 'zip_code',
            $this->string(10)->after('flat_number') );
        $this->addColumn('worker', 'region',
            $this->string(50)->after('zip_code') );
        $this->addColumn('worker', 'date_birthday',
            $this->string(50)->after('surname') );
        $this->addColumn('worker', 'email',
            $this->string(50)->after('date_birthday') );

        // drops foreign key for table `cabinet`
        $this->dropForeignKey(
            'fk-worker-cabinet_id',
            'worker'
        );

        // drops index for column `cabinet_id`
        $this->dropIndex(
            'idx-worker-cabinet_id',
            'worker'
        );

        $this->dropColumn('worker', 'cabinet_id');
        $this->dropColumn('worker', 'id_profil');

        $this->addColumn('worker', 'zbir_id',
            $this->integer(3)->after('id') );

    }

    public function down()
    {
        $this->dropColumn('worker', 'name2');
        $this->dropColumn('worker', 'PESEL');
        $this->dropColumn('worker', 'NIP');
        $this->dropColumn('worker', 'phone_number');
        $this->dropColumn('worker', 'street');
        $this->dropColumn('worker', 'house_number');
        $this->dropColumn('worker', 'flat_number');
        $this->dropColumn('worker', 'zip_code');
        $this->dropColumn('worker', 'region');
        $this->dropColumn('worker', 'date_birthday');
        $this->dropColumn('worker', 'email');

        return false;
    }
}
