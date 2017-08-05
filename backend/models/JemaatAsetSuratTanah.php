<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_aset_surat_tanah".
 *
 * @property integer $id
 * @property integer $jenis_surat_tanah_id
 * @property integer $aset_tanah_id
 * @property string $lokasi_surat_tanah
 *
 * @property EtcJenisSuratTanah $jenisSuratTanah
 * @property JemaatAsetTanah $asetTanah
 */
class JemaatAsetSuratTanah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_aset_surat_tanah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_surat_tanah_id'], 'required'],
            [['jenis_surat_tanah_id', 'aset_tanah_id'], 'integer'],
            [['lokasi_surat_tanah'], 'string', 'max' => 100],
            [['jenis_surat_tanah_id'], 'exist', 'skipOnError' => true, 'targetClass' => EtcJenisSuratTanah::className(), 'targetAttribute' => ['jenis_surat_tanah_id' => 'id']],
            [['aset_tanah_id'], 'exist', 'skipOnError' => true, 'targetClass' => JemaatAsetTanah::className(), 'targetAttribute' => ['aset_tanah_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Aset Surat Tanah',
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
            'jenis_surat_tanah_id' => 'Jenis Surat Tanah ID',
            'aset_tanah_id' => 'Aset Tanah ID',
            'lokasi_surat_tanah' => 'Lokasi Surat Tanah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSuratTanah()
    {
        return $this->hasOne(EtcJenisSuratTanah::className(), ['id' => 'jenis_surat_tanah_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsetTanah()
    {
        return $this->hasOne(JemaatAsetTanah::className(), ['id' => 'aset_tanah_id']);
    }

    public function getNamaFull()
    {
        return  $this->jenisSuratTanah->jenis_surat_tanah . ' dari tanah ' . 
                $this->asetTanah->namaFull;
    }     
}
