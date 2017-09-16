<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property string $name
 * @property integer $nip
 * @property string $reg
 * @property string $status
 * @property integer $department
 *
 * @property Department[] $departments
 * @property UserCompany[] $userCompanies
 * @property Worker[] $workers
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'nip'], 'required'],
            [['nip', 'department'], 'integer'],
            [['name', 'reg', 'status'], 'string', 'max' => 255],
            [['nip'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nazwa firmy',
            'nip' => 'Nip',
            'reg' => 'Reg',
            'status' => 'Status',
            'department' => 'Department',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCompanies()
    {
        return $this->hasMany(User_Company::className(), ['company_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Worker::className(), ['company_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }


    public static function getWorkerList($company_id)
    {
        $droptions = Worker::find()->asArray()->where(['company_id' => $company_id])->all();
        return Arrayhelper::map($droptions, 'id', 'surname');
    }

    public static function getDepartmentList($company_id)
    {
        $droptions = Department::find()->asArray()->where(['company_id' => $company_id])->all();
        return Arrayhelper::map($droptions, 'id', 'department_name');
    }

    public static function getCabinetList($company_id)
    {
        $droptions = Cabinet::find()->asArray()->where(['company_id' => $company_id])->all();
        return Arrayhelper::map($droptions, 'id', 'cabinet_name');
    }

    public static function getZbirList($company_id)
    {
        $droptions = Zbir::find()->asArray()->where(['company_id' => $company_id])->all();
        return Arrayhelper::map($droptions, 'id', 'name');
    }

}
