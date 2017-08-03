<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_demografi".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $mayoritas_pekerjaan
 * @property string $keterangan_pekerjaan
 * @property string $mayoritas_pendidikan
 * @property string $keterangan_pendidikan
 * @property string $mayoritas_ekonomi
 * @property string $keterangan_ekonomi
 * @property string $mayoritas_agama
 * @property string $keterangan_agama
 * @property string $mayoritas_budaya
 * @property string $keterangan_budaya
 *
 * @property Jemaat $jemaat
 */
class JemaatDemografi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_demografi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id'], 'required'],
            [['jemaat_id'], 'integer'],
            [['keterangan_pekerjaan', 'keterangan_pendidikan', 'keterangan_ekonomi', 'keterangan_agama', 'keterangan_budaya'], 'string'],
            [['mayoritasPekerjaan', 'mayoritasPendidikan', 'mayoritasEkonomi', 'mayoritasAgama', 'mayoritasBudaya'], 'safe'],          
            [['mayoritas_pekerjaan', 'mayoritas_pendidikan', 'mayoritas_ekonomi', 'mayoritas_budaya'], 'string', 'max' => 100],
            [['mayoritas_agama'], 'string', 'max' => 40],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Demografi',
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
            'mayoritas_pekerjaan' => 'Pekerjaan anggota jemaat secara mayoritas',
            'keterangan_pekerjaan' => 'Keterangan',
            'mayoritas_pendidikan' => 'Pendidikan anggota jemaat secara mayoritas',
            'keterangan_pendidikan' => 'Keterangan',
            'mayoritas_ekonomi' => 'Keadaan ekonomi anggota jemaat secara mayoritas',
            'keterangan_ekonomi' => 'Keterangan',
            'mayoritas_agama' => 'Mayoritas agama di tengah masyarakat di mana gereja berdiri',
            'keterangan_agama' => 'Keterangan',
            'mayoritas_budaya' => 'Budaya di tengah anggota jemaat',
            'keterangan_budaya' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public function getMayoritasPekerjaan()
    {
        return !empty($this->mayoritas_pekerjaan) ? explode(", ", $this->mayoritas_pekerjaan) : [];
    }
    public function setMayoritasPekerjaan($mayoritasPekerjaan)
    {
        $this->mayoritasPekerjaan = $mayoritasPekerjaan;
    }    

    public function getMayoritasPendidikan()
    {
        return !empty($this->mayoritas_pendidikan) ? explode(", ", $this->mayoritas_pendidikan) : [];
    }
    public function setMayoritasPendidikan($mayoritasPendidikan)
    {
        $this->mayoritasPendidikan = $mayoritasPendidikan;
    }        

    public function getMayoritasEkonomi()
    {
        return !empty($this->mayoritas_ekonomi) ? explode(", ", $this->mayoritas_ekonomi) : [];
    }
    public function setMayoritasEkonomi($mayoritasEkonomi)
    {
        $this->mayoritasEkonomi = $mayoritasEkonomi;
    }        

    public function getMayoritasAgama()
    {
        return !empty($this->mayoritas_agama) ? explode(", ", $this->mayoritas_agama) : [];
    }
    public function setMayoritasAgama($mayoritasAgama)
    {
        $this->mayoritasAgama = $mayoritasAgama;
    }     

    public function getMayoritasBudaya()
    {
        return !empty($this->mayoritas_budaya) ? explode(", ", $this->mayoritas_budaya) : [];
    }
    public function setMayoritasBudaya($mayoritasBudaya)
    {
        $this->mayoritasBudaya = $mayoritasBudaya;
    }        

    public function getNamaFull()
    {
        return  $this->jemaat->namaFull;
    }      


}
