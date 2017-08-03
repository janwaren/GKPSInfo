<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_aset_kendaraan".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property integer $jenis_kendaraan_id
 * @property string $merek
 * @property string $tahun
 * @property string $kondisi
 *
 * @property Jemaat $jemaat
 * @property EtcJenisKendaraan $jenisKendaraan
 */
class JemaatAsetKendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_aset_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'jenis_kendaraan_id', 'merek', 'tahun', 'kondisi'], 'required'],
            [['jemaat_id', 'jenis_kendaraan_id'], 'integer'],
            [['tahun'], 'safe'],
            [['kondisi'], 'string'],
            [['merek'], 'string', 'max' => 30],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
            [['jenis_kendaraan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EtcJenisKendaraan::className(), 'targetAttribute' => ['jenis_kendaraan_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Aset Kendaraan',
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
            'jenis_kendaraan_id' => 'Jenis Kendaraan ID',
            'merek' => 'Merek',
            'tahun' => 'Tahun',
            'kondisi' => 'Kondisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisKendaraan()
    {
        return $this->hasOne(EtcJenisKendaraan::className(), ['id' => 'jenis_kendaraan_id']);
    }

    public function getNamaFull()
    {
        return  $this->jenisKendaraan->jenis_kendaraan . ' dari ' . 
                $this->jemaat->namaFull;
    } 

}
