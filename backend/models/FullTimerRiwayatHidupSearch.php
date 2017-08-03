<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FullTimerRiwayatHidup;

/**
 * FullTimerRiwayatHidupSearch represents the model behind the search form about `backend\models\FullTimerRiwayatHidup`.
 */
class FullTimerRiwayatHidupSearch extends FullTimerRiwayatHidup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'full_timer_id'], 'integer'],
            [['tempat_lahir', 'tanggal_lahir', 'gereja_baptis', 'tanggal_baptis', 'gereja_nikah', 'tanggal_nikah', 'nama_pendeta', 'gereja_sidi', 'tanggal_sidi', 'kisah_hidup'], 'safe'],
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
        $query = FullTimerRiwayatHidup::find();

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
            'tanggal_lahir' => $this->tanggal_lahir,
            'tanggal_baptis' => $this->tanggal_baptis,
            'tanggal_nikah' => $this->tanggal_nikah,
            'tanggal_sidi' => $this->tanggal_sidi,
        ]);

        $query->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'gereja_baptis', $this->gereja_baptis])
            ->andFilterWhere(['like', 'gereja_nikah', $this->gereja_nikah])
            ->andFilterWhere(['like', 'nama_pendeta', $this->nama_pendeta])
            ->andFilterWhere(['like', 'gereja_sidi', $this->gereja_sidi])
            ->andFilterWhere(['like', 'kisah_hidup', $this->kisah_hidup]);

        return $dataProvider;
    }
}
