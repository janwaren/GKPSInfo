<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JemaatAsetSuratTanah;

/**
 * JemaatAsetSuratTanahSearch represents the model behind the search form about `backend\models\JemaatAsetSuratTanah`.
 */
class JemaatAsetSuratTanahSearch extends JemaatAsetSuratTanah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jenis_surat_tanah_id', 'aset_tanah_id'], 'integer'],
            [['lokasi_surat_tanah'], 'safe'],
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
        $query = JemaatAsetSuratTanah::find();

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
            'jenis_surat_tanah_id' => $this->jenis_surat_tanah_id,
            'aset_tanah_id' => $this->aset_tanah_id,
        ]);

        $query->andFilterWhere(['like', 'lokasi_surat_tanah', $this->lokasi_surat_tanah]);

        return $dataProvider;
    }
}
