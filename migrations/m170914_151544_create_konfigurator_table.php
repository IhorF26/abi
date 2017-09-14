<?php

use yii\db\Migration;

/**
 * Handles the creation of table `konfigurator`.
 */
class m170914_151544_create_konfigurator_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('konfigurator', [
            'id' => $this->primaryKey(),
            'zbir_id' => $this->integer(3)->notNull(),
            'department_id' => $this->integer(3)->notNull(),
            'cabinet_id' => $this->integer(4)->notNull(),
            'equipment_id' => $this->integer(3)->notNull(),
            'company_id' => $this->integer(3)->notNull(),
        ]);

        // creates index for column `zbir_id`
        $this->createIndex(
            'idx-konfigurator-zbir_id',
            'konfigurator',
            'zbir_id'
        );

        // add foreign key for table `zbir`
        $this->addForeignKey(
            'fk-konfigurator-zbir_id',
            'konfigurator',
            'zbir_id',
            'zbir',
            'id',
            'CASCADE'
        );

        // creates index for column `department_id`
        $this->createIndex(
            'idx-konfigurator-department_id',
            'konfigurator',
            'department_id'
        );

        // add foreign key for table `department`
        $this->addForeignKey(
            'fk-konfigurator-department_id',
            'konfigurator',
            'department_id',
            'department',
            'id',
            'CASCADE'
        );

        // creates index for column `equipment_id`
        $this->createIndex(
            'idx-konfigurator-equipment_id',
            'konfigurator',
            'equipment_id'
        );

        // add foreign key for table `equipment`
        $this->addForeignKey(
            'fk-konfigurator-equipment_id',
            'konfigurator',
            'equipment_id',
            'equipment',
            'id',
            'CASCADE'
        );

        // creates index for column `cabinet_id`
        $this->createIndex(
            'idx-konfigurator-cabinet_id',
            'konfigurator',
            'cabinet_id'
        );

        // add foreign key for table `cabinet`
        $this->addForeignKey(
            'fk-konfigurator-cabinet_id',
            'konfigurator',
            'cabinet_id',
            'cabinet',
            'id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            'idx-konfigurator-company_id',
            'konfigurator',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-konfigurator-company_id',
            'konfigurator',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

        // drops foreign key for table `zbir`
        $this->dropForeignKey(
            'fk-konfigurator-zbir_id',
            'konfigurator'
        );

        // drops index for column `zbir_id`
        $this->dropIndex(
            'idx-konfigurator-zbir_id',
            'konfigurator'
        );

        // drops foreign key for table `department`
        $this->dropForeignKey(
            'fk-konfigurator-department_id',
            'konfigurator'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-konfigurator-department_id',
            'konfigurator'
        );

        // drops foreign key for table `equipment`
        $this->dropForeignKey(
            'fk-konfigurator-equipment_id',
            'konfigurator'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            'idx-konfigurator-equipment_id',
            'konfigurator'
        );

        // drops foreign key for table `cabinet`
        $this->dropForeignKey(
            'fk-konfigurator-cabinet_id',
            'konfigurator'
        );

        // drops index for column `cabinet_id`
        $this->dropIndex(
            'idx-konfigurator-cabinet_id',
            'konfigurator'
        );

        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-konfigurator-company_id',
            'konfigurator'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-konfigurator-company_id',
            'konfigurator'
        );

        $this->dropTable('konfigurator');
    }
}