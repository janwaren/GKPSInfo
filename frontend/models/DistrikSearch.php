<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Distrik;

/**
 * DistrikSearch represents the model behind the search form about `backend\models\Distrik`.
 */
class DistrikSearch extends Distrik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'super_id', 'level_jemaat_id', 'status_jemaat_id', 'jumlah_tangga_banggal', 'jumlah_tangga_etek', 'jumlah_jiwa', 'jumlah_sintua', 'jumlah_syamas', 'created_by', 'updated_by'], 'integer'],
            [['nama', 'deskripsi', 'alamat', 'telp', 'email', 'tanggal_berdiri', 'nama_pengantar_jemaat', 'created_at', 'updated_at'], 'safe'],
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
        $query = Distrik::find();

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
            'super_id' => $this->super_id,
            'level_jemaat_id' => $this->level_jemaat_id,
            'tanggal_berdiri' => $this->tanggal_berdiri,
            'status_jemaat_id' => $this->status_jemaat_id,
            'jumlah_tangga_banggal' => $this->jumlah_tangga_banggal,
            'jumlah_tangga_etek' => $this->jumlah_tangga_etek,
            'jumlah_jiwa' => $this->jumlah_jiwa,
            'jumlah_sintua' => $this->jumlah_sintua,
            'jumlah_syamas' => $this->jumlah_syamas,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'telp', $this->telp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'nama_pengantar_jemaat', $this->nama_pengantar_jemaat]);

        return $dataProvider;
    }
}
