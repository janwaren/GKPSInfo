<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_aset_bangunan".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property integer $jenis_bangunan_id
 * @property integer $luas_bangunan
 * @property integer $jumlah_unit
 * @property string $kondisi
 *
 * @property Jemaat $jemaat
 * @property EtcJenisBangunan $jenisBangunan
 */
class JemaatAsetBangunan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_aset_bangunan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'jenis_bangunan_id', 'luas_bangunan', 'jumlah_unit'], 'required'],
            [['jemaat_id', 'jenis_bangunan_id', 'luas_bangunan', 'jumlah_unit'], 'integer'],
            [['kondisi'], 'string'],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
            [['jenis_bangunan_id'], 'exist', 'skipOnError' => true, 'targetClass' => EtcJenisBangunan::className(), 'targetAttribute' => ['jenis_bangunan_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Aset Bangunan',
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
            'jenis_bangunan_id' => 'Jenis Bangunan ID',
            'luas_bangunan' => 'Luas Bangunan (m2)',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBangunan()
    {
        return $this->hasOne(EtcJenisBangunan::className(), ['id' => 'jenis_bangunan_id']);
    }

    public function getNamaFull()
    {
        return  $this->jenisBangunan->jenis_bangunan . ' dari ' . 
                $this->jemaat->namaFull;
    } 

}
