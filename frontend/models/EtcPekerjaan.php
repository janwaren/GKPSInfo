<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_pekerjaan".
 *
 * @property integer $id
 * @property string $nama_pekerjaan
 *
 * @property JemaatDemografi[] $jemaatDemografis
 */
class EtcPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_pekerjaan'], 'required'],
            [['nama_pekerjaan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pekerjaan' => 'Nama Pekerjaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDemografis()
    {
        return $this->hasMany(JemaatDemografi::className(), ['mayoritas_pekerjaan' => 'id']);
    }
}
