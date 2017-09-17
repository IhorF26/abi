<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zbir_pol".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $zbir_id
 * @property integer $company_id
 *
 * @property Company $company
 * @property Zbir $zbir
 */
class Zbirpol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zbir_pol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'zbir_id', 'company_id'], 'required'],
            [['status', 'zbir_id', 'company_id'], 'integer'],
            [['name', 'description'], 'string', 'max' => 50],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['zbir_id'], 'exist', 'skipOnError' => true, 'targetClass' => Zbir::className(), 'targetAttribute' => ['zbir_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nazwa pola',
            'description' => 'Opis',
            'status' => 'Status (pole jest używane)',
            'zbir_id' => 'Zbir',
            'company_id' => 'Firma',
        ];
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
    public function getZbir()
    {
        return $this->hasOne(Zbir::className(), ['id' => 'zbir_id']);
    }
}
