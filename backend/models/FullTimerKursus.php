<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "full_timer_kursus".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property string $nama_kursus
 * @property string $tahun
 *
 * @property FullTimer $fullTimer
 */
class FullTimerKursus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer_kursus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'nama_kursus', 'tahun'], 'required'],
            [['full_timer_id'], 'integer'],
            [['tahun'], 'safe'],
            [['nama_kursus'], 'string', 'max' => 100],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Kursus',
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
            'nama_kursus' => 'Nama Kursus',
            'tahun' => 'Tahun',
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
        return  $this->nama_kursus . ' ' . 
                $this->fullTimer->namaFull;
    } 

}
