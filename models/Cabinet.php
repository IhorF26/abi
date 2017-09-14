<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cabinet".
 *
 * @property integer $id
 * @property integer $department_id
 * @property string $cabinet_name
 *
 * @property Department $department
 * @property Worker[] $workers
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
            [['department_id'], 'integer'],
            [['cabinet_name'], 'string', 'max' => 255],
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
            'department_id' => 'Department ID',
            'cabinet_name' => 'Cabinet Name',
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
    public function getWorkers()
    {
        return $this->hasMany(Worker::className(), ['cabinet_id' => 'id']);
    }
}
