<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_program_jenis".
 *
 * @property integer $id
 * @property string $nama_program
 * @property integer $program_bidang_id
 * @property string $keterangan
 *
 * @property JemaatProgram[] $jemaatPrograms
 * @property JemaatProgramBidang $programBidang
 */
class JemaatProgramJenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_program_jenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_program', 'program_bidang_id'], 'required'],
            [['program_bidang_id'], 'integer'],
            [['nama_program'], 'string', 'max' => 200],
            [['keterangan'], 'string', 'max' => 250],
            [['program_bidang_id'], 'exist', 'skipOnError' => true, 'targetClass' => JemaatProgramBidang::className(), 'targetAttribute' => ['program_bidang_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Jenis Pelayanan',
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
            'nama_program' => 'Nama Program',
            'program_bidang_id' => 'Program Bidang ID',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatPrograms()
    {
        return $this->hasMany(JemaatProgram::className(), ['program_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramBidang()
    {
        return $this->hasOne(JemaatProgramBidang::className(), ['id' => 'program_bidang_id']);
    }

    public function getNamaFull()
    {
        return $this->nama_program . ' (' . $this->programBidang->nama_bidang . ')';
    }           
}
