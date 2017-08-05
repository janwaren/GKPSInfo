<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_details".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $alamat_jalan
 * @property string $alamat_desa_kelurahan
 * @property string $alamat_kecamatan
 * @property string $alamat_kota_kabupaten
 * @property string $alamat_provinsi
 * @property string $alamat_kodepos
 * @property string $telp
 * @property string $fax
 * @property string $email
 * @property string $website
 *
 * @property Jemaat $jemaat
 */
class JemaatDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'alamat_jalan', 'alamat_desa_kelurahan', 'alamat_kecamatan', 'alamat_kota_kabupaten', 'alamat_provinsi'], 'required'],
            [['jemaat_id', 'jemaat_location_id'], 'integer'],
            [['alamat_jalan', 'email'], 'string', 'max' => 100],
            [['alamat_desa_kelurahan', 'alamat_kecamatan', 'alamat_kota_kabupaten', 'website'], 'string', 'max' => 50],
            [['alamat_provinsi'], 'string', 'max' => 30],
            [['alamat_kodepos'], 'string', 'max' => 5],
            [['telp', 'fax'], 'string', 'max' => 20],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
            [['jemaat_location_id'], 'exist', 'skipOnError' => true, 'targetClass' => JemaatLocation::className(), 'targetAttribute' => ['jemaat_location_id' => 'id']],            
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Informasi Detail',
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
            'alamat_jalan' => 'Jalan',
            'alamat_desa_kelurahan' => 'Desa/Kelurahan',
            'alamat_kecamatan' => 'Kecamatan',
            'alamat_kota_kabupaten' => 'Kota/Kabupaten',
            'alamat_provinsi' => 'Provinsi',
            'alamat_kodepos' => 'Kodepos',
            'telp' => 'Telp',
            'fax' => 'Fax',
            'email' => 'Email',
            'website' => 'Website',
            'jemaat_location_id' => 'Lokasi Peta',
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
    public function getJemaatLocation()
    {
        return $this->hasOne(JemaatLocation::className(), ['id' => 'jemaat_location_id']);
    }    

    public function getNamaFull()
    {
        return  $this->jemaat->namaFull;
    }      
}
