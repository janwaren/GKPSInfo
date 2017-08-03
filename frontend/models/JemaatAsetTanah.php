<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_aset_tanah".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property integer $luas
 * @property string $lokasi
 * @property string $kondisi_pemakaian
 * @property string $asal_perolehan
 * @property string $keterangan
 *
 * @property JemaatAsetSuratTanah[] $jemaatAsetSuratTanahs
 * @property Jemaat $jemaat
 */
class JemaatAsetTanah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_aset_tanah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'luas', 'lokasi'], 'required'],
            [['jemaat_id', 'luas'], 'integer'],
            [['kondisi_pemakaian', 'asal_perolehan', 'keterangan'], 'string'],
            [['lokasi'], 'string', 'max' => 300],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Aset Tanah',
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
            'jemaat_id' => 'Jemaat ID',
            'luas' => 'Luas (m2)',
            'lokasi' => 'Lokasi',
            'kondisi_pemakaian' => 'Kondisi Pemakaian',
            'asal_perolehan' => 'Asal Perolehan',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatAsetSuratTanahs()
    {
        return $this->hasMany(JemaatAsetSuratTanah::className(), ['aset_tanah_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public function getJemaatAndLokasi()
    {
        return $this->jemaat->namaFull . " di " . $this-> lokasi;
    }

    public function getNamaFull()
    {
        return  $this->jemaat->namaFull . ' di ' . $this->lokasi;
    }     
}
