<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\KarirKantorPusat;

/**
 * KarirKantorPusatSearch represents the model behind the search form about `backend\models\KarirKantorPusat`.
 */
class KarirKantorPusatSearch extends KarirKantorPusat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'full_timer_id', 'jabatan_id', 'organisasi_kantor_pusat_id'], 'integer'],
            [['tahun_mulai', 'tahun_selesai', 'keterangan'], 'safe'],
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
        $query = KarirKantorPusat::find();

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
            'jabatan_id' => $this->jabatan_id,
            'organisasi_kantor_pusat_id' => $this->organisasi_kantor_pusat_id,
            'tahun_mulai' => $this->tahun_mulai,
            'tahun_selesai' => $this->tahun_selesai,
        ]);

        return $dataProvider;
    }
}
