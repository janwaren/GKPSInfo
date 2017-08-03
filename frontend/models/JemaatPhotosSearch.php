<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JemaatPhotos;

/**
 * JemaatPhotosSearch represents the model behind the search form about `backend\models\JemaatPhotos`.
 */
class JemaatPhotosSearch extends JemaatPhotos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id'], 'integer'],
            [['href', 'title', 'type', 'thumbnail'], 'safe'],
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
        $query = JemaatPhotos::find();

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
        ]);

        $query->andFilterWhere(['like', 'href', $this->href])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail]);

        return $dataProvider;
    }
}
