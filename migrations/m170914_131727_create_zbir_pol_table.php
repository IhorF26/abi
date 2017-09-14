<?php

use yii\db\Migration;

/**
 * Handles the creation of table `zbir_pol`.
 */
class m170914_131727_create_zbir_pol_table extends Migration
{
    public function up()
    {
        $this->createTable('zbir_pol', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'description' => $this->string(50)->Null(),
            'status' => $this->boolean()->notNull()->defaultValue('1'),
            'zbir_id' => $this->integer(3)->notNull(),
            'company_id' => $this->integer(3)->notNull(),
        ]);

        // creates index for column `zbir_id`
        $this->createIndex(
            'idx-zbir_pol-zbir_id',
            'zbir_pol',
            'zbir_id'
        );

        // add foreign key for table `zbir`
        $this->addForeignKey(
            'fk-zbir_pol-zbir_id',
            'zbir_pol',
            'zbir_id',
            'zbir',
            'id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            'idx-zbir_pol-company_id',
            'zbir_pol',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-zbir_pol-company_id',
            'zbir_pol',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-zbir_pol-company_id',
            'zbir_pol'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-zbir_pol-company_id',
            'zbir_pol'
        );

        // drops foreign key for table `zbir`
        $this->dropForeignKey(
            'fk-zbir_pol-zbir_id',
            'zbir_pol'
        );

        // drops index for column `zbir_id`
        $this->dropIndex(
            'idx-zbir_pol-zbir_id',
            'zbir_pol'
        );


        $this->dropTable('zbir_pol');
    }
}