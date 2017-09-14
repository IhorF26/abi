<?php

use yii\db\Migration;

/**
 * Handles the creation of table `zbir`.
 */
class m170914_125247_create_zbir_table extends Migration
{
    public function up()
    {
        $this->createTable('zbir', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(50)->Null(),
            'department_id' => $this->integer(3)->notNull(),
            'company_id' => $this->integer(3)->notNull(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'idx-zbir-department_id',
            'zbir',
            'department_id'
        );

        // add foreign key for table `department`
        $this->addForeignKey(
            'fk-zbir-department_id',
            'zbir',
            'department_id',
            'department',
            'id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            'idx-zbir-company_id',
            'zbir',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-zbir-company_id',
            'zbir',
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
            'fk-zbir-department_id',
            'zbir'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-zbir-department_id',
            'zbir'
        );

        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-zbir-company_id',
            'zbir'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-zbir-company_id',
            'zbir'
        );


        $this->dropTable('zbir');
    }
}
