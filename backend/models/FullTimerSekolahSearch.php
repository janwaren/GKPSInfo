<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FullTimerSekolah;

/**
 * FullTimerSekolahSearch represents the model behind the search form about `backend\models\FullTimerSekolah`.
 */
class FullTimerSekolahSearch extends FullTimerSekolah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'full_timer_id'], 'integer'],
            [['sd', 'tahun_lulus_sd', 'smp', 'tahun_lulus_smp', 'sma', 'tahun_lulus_sma'], 'safe'],
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
        $query = FullTimerSekolah::find();

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
            'tahun_lulus_sd' => $this->tahun_lulus_sd,
            'tahun_lulus_smp' => $this->tahun_lulus_smp,
            'tahun_lulus_sma' => $this->tahun_lulus_sma,
        ]);

        $query->andFilterWhere(['like', 'sd', $this->sd])
            ->andFilterWhere(['like', 'smp', $this->smp])
            ->andFilterWhere(['like', 'sma', $this->sma]);

        return $dataProvider;
    }
}
