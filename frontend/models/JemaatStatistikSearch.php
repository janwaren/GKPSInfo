<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JemaatStatistik;

/**
 * JemaatStatistikSearch represents the model behind the search form about `backend\models\JemaatStatistik`.
 */
class JemaatStatistikSearch extends JemaatStatistik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id', 'jumlah_tangga_banggal', 'jumlah_tangga_etek', 'jumlah_jiwa', 'jumlah_sintua', 'jumlah_syamas'], 'integer'],
            [['nama_pengantar_jemaat', 'tahun_data'], 'safe'],
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
        $query = JemaatStatistik::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'tahun_data' => SORT_DESC
                ]
            ],            
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
            'jumlah_tangga_banggal' => $this->jumlah_tangga_banggal,
            'jumlah_tangga_etek' => $this->jumlah_tangga_etek,
            'jumlah_jiwa' => $this->jumlah_jiwa,
            'jumlah_sintua' => $this->jumlah_sintua,
            'jumlah_syamas' => $this->jumlah_syamas,
            'tahun_data' => $this->tahun_data,
        ]);

        $query->andFilterWhere(['like', 'nama_pengantar_jemaat', $this->nama_pengantar_jemaat]);

        return $dataProvider;
    }
}
