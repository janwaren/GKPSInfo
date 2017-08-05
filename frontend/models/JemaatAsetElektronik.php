<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_aset_elektronik".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $nama_alat
 * @property integer $jumlah_unit
 * @property string $kondisi
 *
 * @property Jemaat $jemaat
 */
class JemaatAsetElektronik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_aset_elektronik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'nama_alat', 'jumlah_unit'], 'required'],
            [['jemaat_id', 'jumlah_unit'], 'integer'],
            [['kondisi'], 'string'],
            [['nama_alat'], 'string', 'max' => 100],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Aset Elektronik',
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
            'nama_alat' => 'Nama Alat',
            'jumlah_unit' => 'Jumlah Unit',
            'kondisi' => 'Kondisi',
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
        return  $this->nama_alat . ' dari ' . 
                $this->jemaat->namaFull;
    } 


}
