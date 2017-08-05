<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\JemaatKebaktianSektor;

/**
 * JemaatKebaktianSektorSearch represents the model behind the search form about `backend\models\JemaatKebaktianSektor`.
 */
class JemaatKebaktianSektorSearch extends JemaatKebaktianSektor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id'], 'integer'],
            [['nama_sektor', 'hari', 'jam'], 'safe'],
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
        $query = JemaatKebaktianSektor::find();

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
            'jam' => $this->jam,
        ]);

        $query->andFilterWhere(['like', 'nama_sektor', $this->nama_sektor])
            ->andFilterWhere(['like', 'hari', $this->hari]);

        return $dataProvider;
    }
}
