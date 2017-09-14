<?php

use yii\db\Migration;

class m170914_090812_add_column_to_cabinet_table extends Migration
{
    public function up()
    {
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
    }

    public function down()
    {
        // drops foreign key for table `cabinet`
        $this->dropForeignKey(
            'fk-cabinet_company-company_id',
            'cabinet'
        );

        $this->dropColumn('cabinet', 'company_id');

        return false;
    }
}
