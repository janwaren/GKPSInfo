<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\FullTimerKeluarga;

/**
 * FullTimerKeluargaSearch represents the model behind the search form about `backend\models\FullTimerKeluarga`.
 */
class FullTimerKeluargaSearch extends FullTimerKeluarga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'full_timer_id', 'relasi_id'], 'integer'],
            [['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan'], 'safe'],
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
        $query = FullTimerKeluarga::find();

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
            'relasi_id' => $this->relasi_id,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan]);

        return $dataProvider;
    }
}
