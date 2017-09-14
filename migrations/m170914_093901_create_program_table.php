<?php

use yii\db\Migration;

/**
 * Handles the creation of table `program`.
 */
class m170914_093901_create_program_table extends Migration
{
    public function up()
    {
        $this->createTable('program', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(50)->Null(),
            'department_id' => $this->integer(3)->notNull(),
            'company_id' => $this->integer(3)->notNull(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'idx-program-department_id',
            'program',
            'department_id'
        );

        // add foreign key for table `department`
        $this->addForeignKey(
            'fk-program-department_id',
            'program',
            'department_id',
            'department',
            'id',
            'CASCADE'
        );

        // add foreign key for table `program`
        $this->addForeignKey(
            'fk-program-company_id',
            'program',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drops foreign key for table `department`
        $this->dropForeignKey(
            'fk-program-department_id',
            'program'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-program-department_id',
            'program'
        );

        // drops foreign key for table `program`
        $this->dropForeignKey(
            'fk-program-company_id',
            'program'
        );


        $this->dropTable('program');
    }
}
