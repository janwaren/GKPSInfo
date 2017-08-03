<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "etc_kelas_ekonomi".
 *
 * @property integer $id
 * @property string $kelas_ekonomi
 *
 * @property JemaatDemografi[] $jemaatDemografis
 */
class EtcKelasEkonomi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_kelas_ekonomi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kelas_ekonomi'], 'required'],
            [['kelas_ekonomi'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas_ekonomi' => 'Kelas Ekonomi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDemografis()
    {
        return $this->hasMany(JemaatDemografi::className(), ['mayoritas_ekonomi' => 'id']);
    }
}
