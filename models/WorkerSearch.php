<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Worker;

/**
 * WorkerSearch represents the model behind the search form about `app\models\Worker`.
 */
class WorkerSearch extends Worker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'konfigurator_id', 'num_kadrow', 'PESEL', 'NIP', 'typ_contract', 'company_id'], 'integer'],
            [['name', 'name2', 'surname', 'date_birthday', 'email', 'phone_number', 'street', 'house_number', 'flat_number', 'zip_code', 'region', 'position'], 'safe'],
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
        $query = Worker::find()->where(['company_id' => Yii::$app->session->get('company')])->orderBy('id DESC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'konfigurator_id' => $this->konfigurator_id,
            'num_kadrow' => $this->num_kadrow,
            'PESEL' => $this->PESEL,
            'NIP' => $this->NIP,
            'typ_contract' => $this->typ_contract,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'name2', $this->name2])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'date_birthday', $this->date_birthday])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house_number', $this->house_number])
            ->andFilterWhere(['like', 'flat_number', $this->flat_number])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
