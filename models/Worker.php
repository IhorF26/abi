<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker".
 *
 * @property integer $id
 * @property integer $konfigurator_id
 * @property integer $num_kadrow
 * @property string $name
 * @property string $name2
 * @property string $surname
 * @property string $date_birthday
 * @property string $email
 * @property integer $PESEL
 * @property integer $NIP
 * @property string $phone_number
 * @property string $street
 * @property string $house_number
 * @property string $flat_number
 * @property string $zip_code
 * @property string $region
 * @property string $position
 * @property integer $typ_contract
 * @property integer $company_id
 *
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
            [['konfigurator_id', 'num_kadrow', 'PESEL', 'NIP', 'typ_contract', 'company_id'], 'integer'],
            [['num_kadrow', 'name', 'surname', 'company_id'], 'required'],
            [['name', 'name2', 'surname'], 'string', 'max' => 32],
            [['date_birthday', 'email', 'street', 'region', 'position'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 25],
            [['house_number', 'flat_number', 'zip_code'], 'string', 'max' => 10],
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
            'konfigurator_id' => 'Konfigurator ID',
            'num_kadrow' => 'Num Kadrow',
            'name' => 'Imię',
            'name2' => 'Drugie imię',
            'surname' => 'Nazwisko',
            'date_birthday' => 'Data urodzin',
            'email' => 'Email',
            'PESEL' => 'Pesel',
            'NIP' => 'Nip',
            'phone_number' => 'Numer telefonu',
            'street' => 'Ulica',
            'house_number' => 'Numer domu',
            'flat_number' => 'Numer mieszkania',
            'zip_code' => 'Kod pocztowy',
            'region' => 'Region',
            'position' => 'Pozycja',
            'typ_contract' => 'Typ umowy',
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

}
