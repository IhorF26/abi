<?php

use yii\db\Migration;

class m170912_080721_addcolumntousertable extends Migration
{
    public function up()
    {     
$tableOptions = null;
     if ($this->db->driverName === 'mysql') {
     // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
     $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
	  $this->addColumn('{{%user}}', 'email_confirm_token',            
      $this->string()->after('email') );
	  $this->addColumn('{{%user}}', 'role',            
      $this->smallInteger()->after('status') );
    }

    public function down()
    {
      //  echo "m161109_095443_addfieldstouser cannot be reverted.\n";
	 $this->dropColumn('{{%user}}', 'email_confirm_token');      
     $this->dropColumn('{{%user}}', 'role');            

      //  return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
