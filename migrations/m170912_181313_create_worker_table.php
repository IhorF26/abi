<?php

use yii\db\Migration;

/**
 * Handles the creation of table `worker`.
 */
class m170912_181313_create_worker_table extends Migration
{
    public function up()
    {
        $this->createTable('worker', [
            'id' => $this->primaryKey(),
            'num_kadrow' => $this->integer(11)->notNull(),
            'name' => $this->string(32)->notNull(),
            'surname' => $this->string(32)->notNull(),
            'position' => $this->string(50)->Null(),
            'typ_contract' => $this->integer(3)->notNull(),
            'id_profil' => $this->integer(3)->notNull(),
            'company_id' => $this->integer(3)->notNull(),
            'cabinet_id' => $this->integer(4)->notNull(),
        ]);

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-worker-company_id',
            'worker',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );

        // creates index for column `cabinet_id`
        $this->createIndex(
            'idx-worker-cabinet_id',
            'worker',
            'cabinet_id'
        );

        // add foreign key for table `cabinet`
        $this->addForeignKey(
            'fk-worker-cabinet_id',
            'worker',
            'cabinet_id',
            'cabinet',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        // drops foreign key for table `cabinet`
        $this->dropForeignKey(
            'fk-worker-cabinet_id',
            'worker'
        );

        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-worker-company_id',
            'worker'
        );

        // drops index for column `cabinet_id`
        $this->dropIndex(
            'idx-worker-cabinet_id',
            'worker'
        );


        $this->dropTable('worker');
    }
}

