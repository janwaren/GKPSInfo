<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_agama".
 *
 * @property integer $id
 * @property string $nama_agama
 *
 * @property JemaatDemografi[] $jemaatDemografis
 */
class EtcAgama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_agama'], 'required'],
            [['nama_agama'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_agama' => 'Nama Agama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDemografis()
    {
        return $this->hasMany(JemaatDemografi::className(), ['mayoritas_agama' => 'id']);
    }
}
