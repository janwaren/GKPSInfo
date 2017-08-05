<?php

namespace frontend\models;

use Yii;
use yii\db\Query;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\JemaatProgram;

/**
 * JemaatProgramSearch represents the model behind the search form about `backend\models\JemaatProgram`.
 */
class JemaatProgramSearch extends JemaatProgram
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jemaat_id', 'program_id'], 'integer'],
            [['keterangan'], 'safe'],
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
        $query = JemaatProgram::find();

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
            'program_id' => $this->program_id,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

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
        $query = JemaatProgram::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $queryProgram = (new Query())->select('id')->from('jemaat_program_jenis')->where(['program_bidang_id' => $params]);        

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jemaat_id' => $this->jemaat_id,
            'program_id' => $this->program_id,
        ]);

        $query->andFilterWhere(['program_id' => $queryProgram]);        
        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }    
}
