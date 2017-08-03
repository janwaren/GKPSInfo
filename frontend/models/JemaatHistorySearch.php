<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JemaatHistory;

/**
 * JemaatHistorySearch represents the model behind the search form about `backend\models\JemaatHistory`.
 */
class JemaatHistorySearch extends JemaatHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id', 'tanggal_pamongkoton'], 'integer'],
            [['tanggal_permulaan_kebaktian', 'tanggal_peresmian', 'tanggal_patibal_batu_onjolan', 'narasi'], 'safe'],
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
        $query = JemaatHistory::find();

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
            'tanggal_permulaan_kebaktian' => $this->tanggal_permulaan_kebaktian,
            'tanggal_peresmian' => $this->tanggal_peresmian,
            'tanggal_patibal_batu_onjolan' => $this->tanggal_patibal_batu_onjolan,
            'tanggal_pamongkoton' => $this->tanggal_pamongkoton,
        ]);

        $query->andFilterWhere(['like', 'narasi', $this->narasi]);

        return $dataProvider;
    }
}
