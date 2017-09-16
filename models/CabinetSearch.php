<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cabinet;

/**
 * CabinetSearch represents the model behind the search form about `app\models\Cabinet`.
 */
class CabinetSearch extends Cabinet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'department_id', 'company_id'], 'integer'],
//            [['department', 'company'], 'string'],
            [['cabinet_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cabinet::find()->where(['company_id' => Yii::$app->session->get('company')])->orderBy('id DESC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'department_id' => $this->department_id,
  //          'department' => $this->department->department_name,
        ]);

        $query->andFilterWhere(['like', 'cabinet_name', $this->cabinet_name]);

        return $dataProvider;
    }
}
