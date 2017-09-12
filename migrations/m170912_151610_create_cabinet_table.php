<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cabinet`.
 * Has foreign keys to the tables:
 *
 * - `department`
 */
class m170912_151610_create_cabinet_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cabinet', [
            'id' => $this->primaryKey(),
            'department_id' => $this->integer()->notNull(),
            'cabinet_name' => $this->string(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'idx-cabinet-department_id',
            'cabinet',
            'department_id'
        );

        // add foreign key for table `department`
        $this->addForeignKey(
            'fk-cabinet-department_id',
            'cabinet',
            'department_id',
            'department',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `department`
        $this->dropForeignKey(
            'fk-cabinet-department_id',
            'cabinet'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-cabinet-department_id',
            'cabinet'
        );

        $this->dropTable('cabinet');
    }
}
