<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JemaatDetails;

/**
 * JemaatDetailsSearch represents the model behind the search form about `backend\models\JemaatDetails`.
 */
class JemaatDetailsSearch extends JemaatDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id', 'jemaat_location_id'], 'integer'],
            [['alamat_jalan', 'alamat_desa_kelurahan', 'alamat_kecamatan', 'alamat_kota_kabupaten', 'alamat_provinsi', 'alamat_kodepos', 'telp', 'fax', 'email', 'website', 'jemaat_location_id'], 'safe'],
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
        $query = JemaatDetails::find();

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
            'jemaat_location_id' => $this->jemaat_location_id,
        ]);

        $query->andFilterWhere(['like', 'alamat_jalan', $this->alamat_jalan])
            ->andFilterWhere(['like', 'alamat_desa_kelurahan', $this->alamat_desa_kelurahan])
            ->andFilterWhere(['like', 'alamat_kecamatan', $this->alamat_kecamatan])
            ->andFilterWhere(['like', 'alamat_kota_kabupaten', $this->alamat_kota_kabupaten])
            ->andFilterWhere(['like', 'alamat_provinsi', $this->alamat_provinsi])
            ->andFilterWhere(['like', 'alamat_kodepos', $this->alamat_kodepos])
            ->andFilterWhere(['like', 'telp', $this->telp])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'website', $this->website]);

        return $dataProvider;
    }
}
