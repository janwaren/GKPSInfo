<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_kategorial_bidang".
 *
 * @property integer $id
 * @property string $kategorial_bidang
 * @property string $keterangan
 *
 * @property JemaatKategorialKegiatan[] $jemaatKategorialKegiatans
 */
class JemaatKategorialBidang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_kategorial_bidang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kategorial_bidang'], 'required'],
            [['kategorial_bidang'], 'string', 'max' => 40],
            [['keterangan'], 'string', 'max' => 255],
            [['kategorial_bidang'], 'unique'],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Bidang Kategorial',
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
            'kategorial_bidang' => 'Kategorial',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatKategorialKegiatans()
    {
        return $this->hasMany(JemaatKategorialKegiatan::className(), ['kategorial_id' => 'id']);
    }

    public function getNamaFull()
    {
        return  $this->kategorial_bidang;
    } 

}
