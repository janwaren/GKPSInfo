<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "full_timer_sekolah".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property string $sd
 * @property string $tahun_lulus_sd
 * @property string $smp
 * @property string $tahun_lulus_smp
 * @property string $sma
 * @property string $tahun_lulus_sma
 *
 * @property FullTimer $fullTimer
 */
class FullTimerSekolah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer_sekolah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'sd', 'tahun_lulus_sd', 'smp', 'tahun_lulus_smp', 'sma', 'tahun_lulus_sma'], 'required'],
            [['full_timer_id'], 'integer'],
            [['tahun_lulus_sd', 'tahun_lulus_smp', 'tahun_lulus_sma'], 'safe'],
            [['sd', 'smp', 'sma'], 'string', 'max' => 50],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Pendidikan',
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
            'sd' => 'SD',
            'tahun_lulus_sd' => 'Tahun Lulus',
            'smp' => 'SMP',
            'tahun_lulus_smp' => 'Tahun Lulus',
            'sma' => 'SMA',
            'tahun_lulus_sma' => 'Tahun Lulus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimer()
    {
        return $this->hasOne(FullTimer::className(), ['id' => 'full_timer_id']);
    }

    public function getNamaFull()
    {
        return $this->fullTimer->namaFull;
    } 

}
