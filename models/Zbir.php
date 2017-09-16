<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zbir".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $department_id
 * @property integer $company_id
 *
 * @property Konfigurator[] $konfigurators
 * @property Company $company
 * @property Department $department
 * @property ZbirPol[] $zbirPols
 */
class Zbir extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zbir';
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
            'id' => 'ID',
            'name' => 'Nazwa zbiory',
            'description' => 'Opis',
            'department_id' => 'Nazwa działu',
            'company_id' => 'Nazwa firmy',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonfigurators()
    {
        return $this->hasMany(Konfigurator::className(), ['zbir_id' => 'id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZbirPols()
    {
        return $this->hasMany(ZbirPol::className(), ['zbir_id' => 'id']);
    }
}
