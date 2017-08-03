<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JemaatLocation;

/**
 * JemaatLocationSearch represents the model behind the search form about `backend\models\JemaatLocation`.
 */
class JemaatLocationSearch extends JemaatLocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id'], 'integer'],
            [['address', 'type'], 'safe'],
            [['lat', 'lng'], 'number'],
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
        $query = JemaatLocation::find();

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
            'lat' => $this->lat,
            'lng' => $this->lng,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}