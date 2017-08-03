<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "full_timer_kuliah".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property integer $universitas_id
 * @property string $tahun_masuk
 * @property integer $strata_id
 * @property integer $gelar_id
 * @property string $judul_thesis
 *
 * @property FullTimer $fullTimer
 * @property EtcUniversitas $universitas
 * @property EtcGelar $gelar
 * @property EtcStrata $strata
 */
class FullTimerKuliah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer_kuliah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'universitas_id', 'strata_id', 'gelar_id'], 'required'],
            [['full_timer_id', 'universitas_id', 'strata_id', 'gelar_id'], 'integer'],
            [['tahun_masuk'], 'safe'],
            [['judul_thesis'], 'string', 'max' => 600],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
            [['universitas_id'], 'exist', 'skipOnError' => true, 'targetClass' => EtcUniversitas::className(), 'targetAttribute' => ['universitas_id' => 'id']],
            [['gelar_id'], 'exist', 'skipOnError' => true, 'targetClass' => EtcGelar::className(), 'targetAttribute' => ['gelar_id' => 'id']],
            [['strata_id'], 'exist', 'skipOnError' => true, 'targetClass' => EtcStrata::className(), 'targetAttribute' => ['strata_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Perkuliahan',
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
            'universitas_id' => 'Universitas',
            'tahun_masuk' => 'Tahun Masuk',
            'strata_id' => 'Strata',
            'gelar_id' => 'Gelar',
            'judul_thesis' => 'Judul Thesis',
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
    public function getUniversitas()
    {
        return $this->hasOne(EtcUniversitas::className(), ['id' => 'universitas_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGelar()
    {
        return $this->hasOne(EtcGelar::className(), ['id' => 'gelar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrata()
    {
        return $this->hasOne(EtcStrata::className(), ['id' => 'strata_id']);
    }

    public function getNamaFull()
    {
        return  $this->strata->nama . ' ' . 
                $this->fullTimer->namaFull;
    } 


}
