<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property integer $id
 * @property integer $cabinet_id
 * @property string $name
 * @property string $description
 * @property integer $company_id
 *
 * @property Cabinet $cabinet
 * @property Company $company
 * @property EquipmentProgram[] $equipmentPrograms
 * @property Konfigurator[] $konfigurators
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cabinet_id', 'name', 'company_id'], 'required'],
            [['cabinet_id', 'company_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 50],
            [['cabinet_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cabinet::className(), 'targetAttribute' => ['cabinet_id' => 'id']],
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
            'cabinet_id' => 'Pokój',
            'name' => 'Nazwa urządzenia',
            'description' => 'Opis',
            'company_id' => 'Firma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabinet()
    {
        return $this->hasOne(Cabinet::className(), ['id' => 'cabinet_id']);
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
    public function getEquipmentPrograms()
    {
        return $this->hasMany(EquipmentProgram::className(), ['equipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonfigurators()
    {
        return $this->hasMany(Konfigurator::className(), ['equipment_id' => 'id']);
    }
}
