<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\OrganisasiKantorPusat;

/**
 * OrganisasiKantorPusatSearch represents the model behind the search form about `backend\models\OrganisasiKantorPusat`.
 */
class OrganisasiKantorPusatSearch extends OrganisasiKantorPusat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level_internal_id', 'super_id'], 'integer'],
            [['nama', 'deskripsi', 'telp', 'email', 'status'], 'safe'],
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
        $query = OrganisasiKantorPusat::find();

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
            'level_internal_id' => $this->level_internal_id,
            'super_id' => $this->super_id,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'telp', $this->telp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}