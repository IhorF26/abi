<?php

use yii\db\Migration;

class m170915_185422_add_column_to_konfigurator extends Migration
{
    public function up()
    {

        $this->addColumn('konfigurator', 'program_id',
            $this->integer(3)->after('equipment_id') );

        // creates index for column `program_id`
        $this->createIndex(
            'idx-konfigurator-program_id',
            'konfigurator',
            'program_id'
        );

        // add foreign key for table `program`
        $this->addForeignKey(
            'fk-konfigurator-program_id',
            'konfigurator',
            'program_id',
            'program',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {

        // drops foreign key for table `program`
        $this->dropForeignKey(
            'fk-konfigurator-program_id',
            'konfigurator'
        );

        // drops index for column `program_id`
        $this->dropIndex(
            'idx-konfigurator-program_id',
            'konfigurator'
        );

        $this->dropColumn('konfigurator', 'program_id');


        return false;
    }
}
