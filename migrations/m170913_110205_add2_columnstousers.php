<?php

use yii\db\Migration;

class m170913_110205_add2_columnstousers extends Migration
{
    public function up()
    {     
$tableOptions = null;
     if ($this->db->driverName === 'mysql') {
     // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
     $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
	  $this->addColumn('{{%user}}', 'firstname',            
      $this->string(50)->after('username') );
	  $this->addColumn('{{%user}}', 'lastname',            
      $this->string(50)->after('firstname') );
	  $this->addColumn('{{%user}}', 'phone_number',            
      $this->string(25)->after('lastname') );
	  $this->addColumn('{{%user}}', 'street',            
      $this->string(50)->after('phone_number') );
	  $this->addColumn('{{%user}}', 'house_number',            
      $this->string(10)->after('street') );
	  $this->addColumn('{{%user}}', 'flat_number',            
      $this->string(10)->after('house_number') );
	  $this->addColumn('{{%user}}', 'zip_code',            
      $this->string(10)->after('flat_number') );
	  $this->addColumn('{{%user}}', 'region',            
      $this->string(50)->after('flat_number') );
    }

    public function down()
    {
     $this->dropColumn('{{%user}}', 'first_name');      
     $this->dropColumn('{{%user}}', 'last_name');            
    $this->dropColumn('{{%user}}', 'phone_number');      
    $this->dropColumn('{{%user}}', 'street');      
     $this->dropColumn('{{%user}}', 'house_number');            
	 $this->dropColumn('{{%user}}', 'flat_number');      
     $this->dropColumn('{{%user}}', 'zip_code');            
	 $this->dropColumn('{{%user}}', 'region');      

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
