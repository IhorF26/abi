<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Company;
use app\models\User;
use app\models\User_Company;

/**
 * CompanySearch represents the model behind the search form about `app\models\Company`.
 */
class CompanySearch extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nip', 'department'], 'integer'],
            [['name', 'reg', 'status'], 'safe'],
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
	    $user_id = Yii::$app->user->id;   //or getId();
		$subQuery = (new \yii\db\Query())->select('company_id')->from('user_company')->where(['user_id' => $user_id]);
    	$query = Company::find()->where(['in', 'id', $subQuery]);

//	      $query = Company::find()->where(['and',['field' => $value],['in', 'user_id', $subQuery]])->all();
//	      die (print_r($query));
//        $query = Company::find();

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
            'nip' => $this->nip,
            'department' => $this->department,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'reg', $this->reg])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
