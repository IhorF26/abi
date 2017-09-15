<?php

use yii\db\Migration;

class m170915_121705_add_column_to_cabinet extends Migration
{
    public function up()
    {

        // drops foreign key for table `cabinet`
        $this->dropForeignKey(
            'fk-cabinet_company-company_id',
            'cabinet'
        );

        $this->dropColumn('cabinet', 'company_id');

        $this->addColumn('cabinet', 'company_id',
            $this->integer(3)->after('cabinet_name')->notNull() );

        // creates index for column `company_id`
        $this->createIndex(
            'idx-cabinet-company_id',
            'cabinet',
            'company_id'
        );

        // add foreign key for table `company`
        $this->addForeignKey(
            'fk-cabinet-company_id',
            'cabinet',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {

        // drops foreign key for table `cabinet`
        $this->dropForeignKey(
            'fk-cabinet-company_id',
            'cabinet'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            'idx-cabinet-company_id',
            'cabinet'
        );

        $this->dropColumn('cabinet', 'company_id');

        $this->addColumn('cabinet', 'company_id',
            $this->integer(3)->after('cabinet_name') );

        // add foreign key for table `cabinet`
        $this->addForeignKey(
            'fk-cabinet_company-company_id',
            'cabinet',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );

        return false;
    }
}
