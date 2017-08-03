<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_kategorial_kegiatan".
 *
 * @property integer $id
 * @property string $nama_kegiatan
 * @property integer $kategorial_id
 * @property string $keterangan
 *
 * @property JemaatKategorial[] $jemaatKategorials
 * @property JemaatKategorialBidang $kategorial
 */
class JemaatKategorialKegiatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_kategorial_kegiatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kegiatan', 'kategorial_id', 'keterangan'], 'required'],
            [['kategorial_id'], 'integer'],
            [['nama_kegiatan'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 255],
            [['kategorial_id'], 'exist', 'skipOnError' => true, 'targetClass' => JemaatKategorialBidang::className(), 'targetAttribute' => ['kategorial_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Jenis Kegiatan Kategorial',
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
            'nama_kegiatan' => 'Nama Kegiatan',
            'kategorial_id' => 'Kategorial ID',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatKategorials()
    {
        return $this->hasMany(JemaatKategorial::className(), ['kegiatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategorial()
    {
        return $this->hasOne(JemaatKategorialBidang::className(), ['id' => 'kategorial_id']);
    }

    public function getNamaFull()
    {
        return  $this->nama_kegiatan . ' (' . $this->kategorial->kategorial_bidang . ')';
    }     
}
