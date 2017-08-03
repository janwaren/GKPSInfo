<?php

namespace backend\models;

use Yii;
use yii\db\Query;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JemaatKategorial;

/**
 * JemaatKategorialSearch represents the model behind the search form about `backend\models\JemaatKategorial`.
 */
class JemaatKategorialSearch extends JemaatKategorial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id', 'kegiatan_id'], 'integer'],
            [['tempat', 'hari', 'jadwal', 'jam', 'keterangan'], 'safe'],
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
        $query = JemaatKategorial::find();

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
            'kegiatan_id' => $this->kegiatan_id,
            'jam' => $this->jam,            
        ]);

        $query->andFilterWhere(['like', 'tempat', $this->tempat])
            ->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'jadwal', $this->jadwal])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchFor($params)
    {
        $query = JemaatKategorial::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $queryKegiatan = (new Query())->select('id')->from('jemaat_kategorial_kegiatan')->where(['kategorial_id' => $params]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jemaat_id' => $this->jemaat_id,
            // 'kegiatan_id' => $this->kegiatan_id,
            'jam' => $this->jam,            
        ]);

        $query->andFilterWhere(['kegiatan_id' => $queryKegiatan]);

        $query->andFilterWhere(['like', 'tempat', $this->tempat])
            ->andFilterWhere(['like', 'hari', $this->hari])
            ->andFilterWhere(['like', 'jadwal', $this->jadwal])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }

}
