<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FullTimerKuliah;

/**
 * FullTimerKuliahSearch represents the model behind the search form about `backend\models\FullTimerKuliah`.
 */
class FullTimerKuliahSearch extends FullTimerKuliah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'full_timer_id', 'universitas_id', 'strata_id', 'gelar_id'], 'integer'],
            [['tahun_masuk', 'judul_thesis'], 'safe'],
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
        $query = FullTimerKuliah::find();

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
            'full_timer_id' => $this->full_timer_id,
            'universitas_id' => $this->universitas_id,
            'tahun_masuk' => $this->tahun_masuk,
            'strata_id' => $this->strata_id,
            'gelar_id' => $this->gelar_id,
        ]);

        $query->andFilterWhere(['like', 'judul_thesis', $this->judul_thesis]);

        return $dataProvider;
    }
}
