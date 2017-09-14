<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equipment`.
 */
class m170914_094509_create_equipment_table extends Migration
{
    public function up()
    {
        $this->createTable('equipment', [
            'id' => $this->primaryKey(),
            'cabinet_id' => $this->integer(3)->notNull(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(50)->Null(),
            'company_id' => $this->integer(3)->notNull(),
        ]);


        // creates index for column `cabinet_id`
        $this->createIndex(
            'idx-equipment-cabinet_id',
            'equipment',
            'cabinet_id'
        );

        // add foreign key for table `cabinet`
        $this->addForeignKey(
            'fk-equipment-cabinet_id',
            'equipment',
            'cabinet_id',
            'cabinet',
            'id',
            'CASCADE'
        );

        // add foreign key for table `program`
        $this->addForeignKey(
            'fk-equipment-company_id',
            'equipment',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-equipment-company_id',
            'equipment'
        );

        $this->dropForeignKey(
            'fk-equipment-cabinet_id',
            'worker'
        );

        $this->dropIndex(
            'idx-equipment-cabinet_id',
            'worker'
        );


        $this->dropTable('equipment');
    }
}
