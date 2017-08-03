<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "karir_kantor_pusat".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property integer $jabatan_id
 * @property integer $organisasi_kantor_pusat_id
 * @property string $tahun_mulai
 * @property string $tahun_selesai
 *
 * @property FullTimer $fullTimer
 * @property KarirEtcJabatan $jabatan
 * @property OrganisasiKantorPusat $organisasiKantorPusat
 */
class KarirKantorPusat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karir_kantor_pusat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'jabatan_id', 'organisasi_kantor_pusat_id', 'tahun_mulai', 'tahun_selesai'], 'required'],
            [['full_timer_id', 'jabatan_id', 'organisasi_kantor_pusat_id'], 'integer'],
            [['tahun_mulai', 'tahun_selesai'], 'safe'],
            [['keterangan'], 'string'],            
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => KarirEtcJabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
            [['organisasi_kantor_pusat_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganisasiKantorPusat::className(), 'targetAttribute' => ['organisasi_kantor_pusat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Pelayanan Kantor Pusat',
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
            'full_timer_id' => 'Full Timer ID',
            'jabatan_id' => 'Posisi',
            'organisasi_kantor_pusat_id' => 'Organisasi Kantor Pusat',
            'tahun_mulai' => 'Tahun Mulai',
            'tahun_selesai' => 'Tahun Selesai',
            'keterangan' => 'Keterangan',            
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimer()
    {
        return $this->hasOne(FullTimer::className(), ['id' => 'full_timer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(KarirEtcJabatan::className(), ['id' => 'jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganisasiKantorPusat()
    {
        return $this->hasOne(OrganisasiKantorPusat::className(), ['id' => 'organisasi_kantor_pusat_id']);
    }

    public function getNamaFull()
    {
        return $this->fullTimer->namaFull . ' di ' . $this->organisasiKantorPusat->namaFull;
    }     

}
