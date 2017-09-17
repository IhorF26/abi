<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $department_id
 * @property integer $company_id
 *
 * @property EquipmentProgram[] $equipmentPrograms
 * @property Company $company
 * @property Department $department
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'department_id', 'company_id'], 'required'],
            [['department_id', 'company_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 50],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'name' => 'Nazwa programu',
            'description' => 'Opis',
            'department_id' => 'Dział',
            'company_id' => 'Firma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentPrograms()
    {
        return $this->hasMany(EquipmentProgram::className(), ['program_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
