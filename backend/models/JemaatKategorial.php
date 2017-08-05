<?php

namespace backend\models;

use Yii;
use backend\controllers\JemaatKategorialKegiatanController;

/**
 * This is the model class for table "jemaat_kategorial".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property integer $kegiatan_id
 * @property string $tempat
 * @property string $hari
 * @property string $jadwal
 * @property string $jam
 * @property string $keterangan
 * @property string $kategorial_id
 *
 * @property JemaatKategorialKegiatan $kegiatan
 * @property Jemaat $jemaat
 */
class JemaatKategorial extends \yii\db\ActiveRecord
{

    public $kategorial_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_kategorial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'kegiatan_id', 'jam'], 'required'],
            [['jemaat_id', 'kegiatan_id'], 'integer'],
            [['hari', 'jadwal'], 'string'],
            [['jam'], 'safe'],
            [['tempat'], 'string', 'max' => 30],
            [['keterangan'], 'string', 'max' => 300],
            [['kegiatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => JemaatKategorialKegiatan::className(), 'targetAttribute' => ['kegiatan_id' => 'id']],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Kegiatan Kategorial',
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
            'kegiatan_id' => 'Kegiatan ID',
            'tempat' => 'Tempat',
            'hari' => 'Hari',
            'jadwal' => 'Jadwal',
            'jam' => 'Jam',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKegiatan()
    {
        return $this->hasOne(JemaatKategorialKegiatan::className(), ['id' => 'kegiatan_id']);
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
        return  $this->kegiatan->nama_kegiatan . ' di ' . $this->jemaat->namaFull;
    }          

}
