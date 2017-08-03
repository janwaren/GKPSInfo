<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JemaatDemografi;

/**
 * JemaatDemografiSearch represents the model behind the search form about `backend\models\JemaatDemografi`.
 */
class JemaatDemografiSearch extends JemaatDemografi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id'], 'integer'],
            [['mayoritas_pekerjaan', 'keterangan_pekerjaan', 'mayoritas_pendidikan', 'keterangan_pendidikan', 'mayoritas_ekonomi', 'keterangan_ekonomi', 'mayoritas_agama', 'keterangan_agama', 'mayoritas_budaya', 'keterangan_budaya'], 'safe'],
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
        $query = JemaatDemografi::find();

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
            'jemaat_id' => $this->jemaat_id,
        ]);

        $query->andFilterWhere(['like', 'mayoritas_pekerjaan', $this->mayoritas_pekerjaan])
            ->andFilterWhere(['like', 'keterangan_pekerjaan', $this->keterangan_pekerjaan])
            ->andFilterWhere(['like', 'mayoritas_pendidikan', $this->mayoritas_pendidikan])
            ->andFilterWhere(['like', 'keterangan_pendidikan', $this->keterangan_pendidikan])
            ->andFilterWhere(['like', 'mayoritas_ekonomi', $this->mayoritas_ekonomi])
            ->andFilterWhere(['like', 'keterangan_ekonomi', $this->keterangan_ekonomi])
            ->andFilterWhere(['like', 'mayoritas_agama', $this->mayoritas_agama])
            ->andFilterWhere(['like', 'keterangan_agama', $this->keterangan_agama])
            ->andFilterWhere(['like', 'mayoritas_budaya', $this->mayoritas_budaya])
            ->andFilterWhere(['like', 'keterangan_budaya', $this->keterangan_budaya]);

        return $dataProvider;
    }
}
