<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "karir_kepanitiaan".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property integer $posisi_id
 * @property integer $kepanitiaan_id
 * @property string $tahun
 *
 * @property FullTimer $fullTimer
 * @property KarirEtcJabatan $posisi
 * @property OrganisasiKepanitiaan $kepanitiaan
 */
class KarirKepanitiaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karir_kepanitiaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'posisi_id', 'kepanitiaan_id', 'tahun'], 'required'],
            [['full_timer_id', 'posisi_id', 'kepanitiaan_id'], 'integer'],
            [['tahun'], 'safe'],
            [['keterangan'], 'string'],            
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
            [['posisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => KarirEtcJabatan::className(), 'targetAttribute' => ['posisi_id' => 'id']],
            [['kepanitiaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganisasiKepanitiaan::className(), 'targetAttribute' => ['kepanitiaan_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Pelayanan Kepanitiaan',
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
            'posisi_id' => 'Posisi ID',
            'kepanitiaan_id' => 'Kepanitiaan ID',
            'tahun' => 'Tahun',
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
    public function getPosisi()
    {
        return $this->hasOne(KarirEtcJabatan::className(), ['id' => 'posisi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepanitiaan()
    {
        return $this->hasOne(OrganisasiKepanitiaan::className(), ['id' => 'kepanitiaan_id']);
    }

    public function getNamaFull()
    {
        return $this->fullTimer->namaFull . ' di ' . $this->kepanitiaan->namaFull;
    }      

}
