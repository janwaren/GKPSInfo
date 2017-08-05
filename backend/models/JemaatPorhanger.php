<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_porhanger".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $nama_porhanger
 * @property string $tahun_mulai
 * @property string $tahun_selesai
 * @property string $keterangan
 *
 * @property Jemaat $jemaat
 */
class JemaatPorhanger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_porhanger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'nama_porhanger', 'tahun_mulai', 'tahun_selesai'], 'required'],
            [['jemaat_id'], 'integer'],
            [['tahun_mulai', 'tahun_selesai'], 'safe'],
            [['nama_porhanger'], 'string', 'max' => 80],
            [['keterangan'], 'string', 'max' => 255],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Porhanger',
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
            'nama_porhanger' => 'Nama',
            'tahun_mulai' => 'Tahun Mulai',
            'tahun_selesai' => 'Tahun Selesai',
            'keterangan' => 'Keterangan',
        ];
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
        return $this->jemaat->namaFull;
    }    


}
