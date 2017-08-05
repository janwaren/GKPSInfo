<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FullTimerKursus;

/**
 * FullTimerKursusSearch represents the model behind the search form about `backend\models\FullTimerKursus`.
 */
class FullTimerKursusSearch extends FullTimerKursus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'full_timer_id'], 'integer'],
            [['nama_kursus', 'tahun'], 'safe'],
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
        $query = FullTimerKursus::find();

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
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'nama_kursus', $this->nama_kursus]);

        return $dataProvider;
    }
}
