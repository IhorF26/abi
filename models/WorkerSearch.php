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
            [['id', 'num_kadrow', 'typ_contract', 'id_profil', 'company_id', 'cabinet_id'], 'integer'],
            [['name', 'surname', 'position'], 'safe'],
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
        $query = Worker::find();

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
            'num_kadrow' => $this->num_kadrow,
            'typ_contract' => $this->typ_contract,
            'id_profil' => $this->id_profil,
            'company_id' => $this->company_id,
            'cabinet_id' => $this->cabinet_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
