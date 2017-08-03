<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JemaatAsetKendaraan;

/**
 * JemaatAsetKendaraanSearch represents the model behind the search form about `backend\models\JemaatAsetKendaraan`.
 */
class JemaatAsetKendaraanSearch extends JemaatAsetKendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id', 'jenis_kendaraan_id'], 'integer'],
            [['merek', 'tahun', 'kondisi'], 'safe'],
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
        $query = JemaatAsetKendaraan::find();

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
            'jenis_kendaraan_id' => $this->jenis_kendaraan_id,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'merek', $this->merek])
            ->andFilterWhere(['like', 'kondisi', $this->kondisi]);

        return $dataProvider;
    }
}
