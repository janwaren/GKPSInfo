<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "full_timer_keluarga".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property string $nama
 * @property string $jenis_kelamin
 * @property integer $relasi_id
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $pekerjaan
 *
 * @property FullTimer $fullTimer
 * @property EtcRelasiKeluarga $relasi
 */
class FullTimerKeluarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer_keluarga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'nama', 'jenis_kelamin', 'relasi_id', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan'], 'required'],
            [['full_timer_id', 'relasi_id'], 'integer'],
            [['jenis_kelamin'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['tempat_lahir'], 'string', 'max' => 60],
            [['pekerjaan'], 'string', 'max' => 30],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
            [['relasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => EtcRelasiKeluarga::className(), 'targetAttribute' => ['relasi_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Anggota Keluarga',
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
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'relasi_id' => 'Relasi',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'pekerjaan' => 'Pekerjaan',
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
    public function getRelasi()
    {
        return $this->hasOne(EtcRelasiKeluarga::className(), ['id' => 'relasi_id']);
    }

    public function getNamaFull()
    {
        return  $this->nama . ' (' . $this->relasi->nama_relasi . ') dari ' . 
                $this->fullTimer->namaFull;
    }      
}
