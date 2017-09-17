<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cabinet".
 *
 * @property integer $id
 * @property integer $department_id
 * @property string $cabinet_name
 * @property integer $company_id
 *
 * @property Department $department
 * @property Company $company
 * @property Equipment[] $equipments
 * @property Konfigurator[] $konfigurators
 */
class Cabinet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cabinet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id'], 'required'],
            [['department_id', 'company_id'], 'integer'],
            [['cabinet_name'], 'string', 'max' => 255],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'department' => 'Nazwa działu',
            'cabinet_name' => 'Pokój',
            'company' => 'Firma',
        ];
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
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::className(), ['cabinet_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonfigurators()
    {
        return $this->hasMany(Konfigurator::className(), ['cabinet_id' => 'id']);
    }


}
