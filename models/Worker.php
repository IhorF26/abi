<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker".
 *
 * @property integer $id
 * @property integer $num_kadrow
 * @property string $name
 * @property string $surname
 * @property string $position
 * @property integer $typ_contract
 * @property integer $id_profil
 * @property integer $company_id
 * @property integer $cabinet_id
 *
 * @property Cabinet $cabinet
 * @property Company $company
 */
class Worker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_kadrow', 'name', 'surname', 'typ_contract', 'id_profil', 'company_id', 'cabinet_id'], 'required'],
            [['num_kadrow', 'typ_contract', 'id_profil', 'company_id', 'cabinet_id'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 32],
            [['position'], 'string', 'max' => 50],
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
            'id' => 'ID',
            'num_kadrow' => 'Num Kadrow',
            'name' => 'Name',
            'surname' => 'Surname',
            'position' => 'Position',
            'typ_contract' => 'Typ Contract',
            'id_profil' => 'Id Profil',
            'company_id' => 'Company ID',
            'cabinet_id' => 'Cabinet ID',
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
}
