<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "karir_jemaat".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property integer $jabatan_id
 * @property integer $jemaat_id
 * @property string $tahun_mulai
 * @property string $tahun_selesai
 * @property string $keterangan
 *
 * @property FullTimer $fullTimer
 * @property KarirEtcJabatan $jabatan
 * @property Jemaat $jemaat
 */
class KarirJemaat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karir_jemaat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'jabatan_id', 'jemaat_id', 'tahun_mulai'], 'required'],
            [['full_timer_id', 'jabatan_id', 'jemaat_id'], 'integer'],
            [['tahun_mulai', 'tahun_selesai'], 'safe'],
            [['keterangan'], 'string', 'max' => 100],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => KarirEtcJabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Pelayanan Ber-Jemaat',
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
            'jabatan_id' => 'Jabatan',
            'jemaat_id' => 'Jemaat Penempatan',
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
    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public function getNamaFull()
    {
        return $this->fullTimer->namaFull . ' di ' . $this->jemaat->namaFull;
    }     
}
