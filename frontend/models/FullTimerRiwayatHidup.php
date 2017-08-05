<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "full_timer_riwayat_hidup".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $gereja_baptis
 * @property string $tanggal_baptis
 * @property string $gereja_nikah
 * @property string $tanggal_nikah
 * @property string $nama_pendeta
 * @property string $gereja_sidi
 * @property string $tanggal_sidi
 * @property string $kisah_hidup
 *
 * @property FullTimer $fullTimer
 */
class FullTimerRiwayatHidup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer_riwayat_hidup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'gereja_sidi', 'tanggal_sidi', 'kisah_hidup'], 'required'],
            [['full_timer_id'], 'integer'],
            [['tanggal_lahir', 'tanggal_baptis', 'tanggal_nikah', 'tanggal_sidi'], 'safe'],
            [['kisah_hidup'], 'string'],
            [['tempat_lahir', 'gereja_baptis', 'gereja_nikah', 'gereja_sidi'], 'string', 'max' => 60],
            [['nama_pendeta'], 'string', 'max' => 100],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Riwayat Hidup',
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
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'gereja_baptis' => 'Gereja Baptis',
            'tanggal_baptis' => 'Tanggal Baptis',
            'gereja_nikah' => 'Gereja Nikah',
            'tanggal_nikah' => 'Tanggal Nikah',
            'nama_pendeta' => 'Nama Pendeta',
            'gereja_sidi' => 'Gereja Sidi',
            'tanggal_sidi' => 'Tanggal Sidi',
            'kisah_hidup' => 'Kisah Hidup',
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
