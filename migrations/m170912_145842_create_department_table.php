<?php

use yii\db\Migration;

/**
 * Handles the creation of table `department`.
 * Has foreign keys to the tables:
 *
 * - `company`
 */
class m170912_145842_create_department_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('department', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'department_name' => $this->string(),
        ]);

        // creates index for column `company_id`
        $this->createIndex(
            'idx-department-company_id',
            'department',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-department-company_id',
            'department',
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
        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-department-company_id',
            'department'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-department-company_id',
            'department'
        );

        $this->dropTable('department');
    }
}
