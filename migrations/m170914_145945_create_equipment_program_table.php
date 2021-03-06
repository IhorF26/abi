<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equipment_program`.
 */
class m170914_145945_create_equipment_program_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('equipment_program', [
            'id' => $this->primaryKey(),
            'equipment_id' => $this->integer(3)->notNull(),
            'program_id' => $this->integer(3)->notNull(),
            'company_id' => $this->integer(3)->notNull(),
        ]);

        // creates index for column `equipment_id`
        $this->createIndex(
            'idx-equipment_program-equipment_id',
            'equipment_program',
            'equipment_id'
        );

        // add foreign key for table `equipment`
        $this->addForeignKey(
            'fk-equipment_program-equipment_id',
            'equipment_program',
            'equipment_id',
            'equipment',
            'id',
            'CASCADE'
        );

        // creates index for column `program_id`
        $this->createIndex(
            'idx-equipment_program-program_id',
            'equipment_program',
            'program_id'
        );

        // add foreign key for table `program`
        $this->addForeignKey(
            'fk-equipment_program-program_id',
            'equipment_program',
            'program_id',
            'program',
            'id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            'idx-equipment_program-company_id',
            'equipment_program',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-equipment_program-company_id',
            'equipment_program',
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
        // drops foreign key for table `equipment`
        $this->dropForeignKey(
            'fk-equipment_program-equipment_id',
            'equipment_program'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            'idx-equipment_program-equipment_id',
            'equipment_program'
        );

        // drops foreign key for table `program`
        $this->dropForeignKey(
            'fk-equipment_program-program_id',
            'equipment_program'
        );

        // drops index for column `program_id`
        $this->dropIndex(
            'idx-equipment_program-program_id',
            'equipment_program'
        );

        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-equipment_program-company_id',
            'equipment_program'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-equipment_program-company_id',
            'equipment_program'
        );

        $this->dropTable('equipment_program');
    }
}

