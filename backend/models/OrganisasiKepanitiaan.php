<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "organisasi_kepanitiaan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $tempat
 * @property string $keterangan
 *
 * @property KarirKepanitiaan[] $karirKepanitiaans
 */
class OrganisasiKepanitiaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisasi_kepanitiaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['keterangan'], 'string'],
            [['nama'], 'string', 'max' => 200],
            [['tempat'], 'string', 'max' => 40],
            [['nama'], 'unique'],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Struktur Organisasi Kepanitiaan',
                ],
            ],
        ];
    }       

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tempat' => 'Tempat',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirKepanitiaans()
    {
        return $this->hasMany(KarirKepanitiaan::className(), ['kepanitiaan_id' => 'id']);
    }

    public function getFullName()
    {
        return $this->nama . ' (' . $this->tempat . ')';
    }

    public function getNamaFull()
    {
        return $this->nama . ' (' . $this->tempat . ')';
    }      
}
