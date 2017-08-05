<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JemaatPorhanger;

/**
 * JemaatPorhangerSearch represents the model behind the search form about `backend\models\JemaatPorhanger`.
 */
class JemaatPorhangerSearch extends JemaatPorhanger
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id'], 'integer'],
            [['nama_porhanger', 'tahun_mulai', 'tahun_selesai', 'keterangan'], 'safe'],
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
        $query = JemaatPorhanger::find();

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
            'tahun_mulai' => $this->tahun_mulai,
            'tahun_selesai' => $this->tahun_selesai,
        ]);

        $query->andFilterWhere(['like', 'nama_porhanger', $this->nama_porhanger])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
