<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $department_name
 *
 * @property Cabinet[] $cabinets
 * @property Company $company
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'required'],
            [['company_id'], 'integer'],
            [['department_name'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'L.p.',
            'company_id' => '',
            'department_name' => 'Nazwa Działu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabinets()
    {
        return $this->hasMany(Cabinet::className(), ['department_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public static function getCabinetList($department_id)
    {
        $droptions = Cabinet::find()->asArray()->where(['department_id' => $department_id])->all();
        return Arrayhelper::map($droptions, 'id', 'cabinet_name');
    }



}
