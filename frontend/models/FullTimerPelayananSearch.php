<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FullTimerPelayanan;

/**
 * FullTimerPelayananSearch represents the model behind the search form about `backend\models\FullTimerPelayanan`.
 */
class FullTimerPelayananSearch extends FullTimerPelayanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'full_timer_id', 'jemaat_tahbis_id', 'gaji_terakhir'], 'integer'],
            [['tanggal_tahbis', 'refleksi_pribadi_pelayanan', 'pencapaian_pelayanan', 'visi_pribadi', 'misi_pribadi', 'motto'], 'safe'],
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
        $query = FullTimerPelayanan::find();

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
            'jemaat_tahbis_id' => $this->jemaat_tahbis_id,
            'tanggal_tahbis' => $this->tanggal_tahbis,
            'golongan' => $this->golongan,
            'ruang' => $this->ruang,
            'gaji_terakhir' => $this->gaji_terakhir,
        ]);

        $query->andFilterWhere(['like', 'refleksi_pribadi_pelayanan', $this->refleksi_pribadi_pelayanan])
            ->andFilterWhere(['like', 'pencapaian_pelayanan', $this->pencapaian_pelayanan])
            ->andFilterWhere(['like', 'visi_pribadi', $this->visi_pribadi])
            ->andFilterWhere(['like', 'misi_pribadi', $this->misi_pribadi])
            ->andFilterWhere(['like', 'motto', $this->motto]);

        return $dataProvider;
    }
}
