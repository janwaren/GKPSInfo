<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_program_bidang".
 *
 * @property integer $id
 * @property string $nama_bidang
 * @property string $keterangan
 *
 * @property JemaatProgramJenis[] $jemaatProgramJenis
 */
class JemaatProgramBidang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_program_bidang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_bidang'], 'required'],
            [['nama_bidang'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 255],
            [['nama_bidang'], 'unique'],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Bidang Pelayanan',
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
            'nama_bidang' => 'Nama Bidang',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatProgramJenis()
    {
        return $this->hasMany(JemaatProgramJenis::className(), ['program_bidang_id' => 'id']);
    }

    public function getNamaFull()
    {
        return $this->nama_bidang;
    }       


}
