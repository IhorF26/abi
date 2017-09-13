<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_company`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `company`
 */
class m170913_141049_create_user_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_company', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_company-user_id',
            'user_company',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_company-user_id',
            'user_company',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            'idx-user_company-company_id',
            'user_company',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-user_company-company_id',
            'user_company',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_company-user_id',
            'user_company'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_company-user_id',
            'user_company'
        );

        // drops foreign key for table `company`
        $this->dropForeignKey(
            'fk-user_company-company_id',
            'user_company'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            'idx-user_company-company_id',
            'user_company'
        );

        $this->dropTable('user_company');
    }
}
