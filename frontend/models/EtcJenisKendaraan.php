<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_jenis_kendaraan".
 *
 * @property integer $id
 * @property string $jenis_kendaraan
 *
 * @property JemaatAsetKendaraan[] $jemaatAsetKendaraans
 */
class EtcJenisKendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_jenis_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_kendaraan'], 'required'],
            [['jenis_kendaraan'], 'string', 'max' => 30],
            [['jenis_kendaraan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_kendaraan' => 'Jenis Kendaraan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatAsetKendaraans()
    {
        return $this->hasMany(JemaatAsetKendaraan::className(), ['jenis_kendaraan_id' => 'id']);
    }
}
