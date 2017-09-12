<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m170912_143434_create_company_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'nip' => $this->integer()->notNull()->unique(),
            'reg' => $this->string(),
            'status' => $this->string(),
            'department' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('company');
    }
}
