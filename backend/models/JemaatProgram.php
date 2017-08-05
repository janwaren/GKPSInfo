<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_program".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property integer $program_id
 * @property string $keterangan
 *
 * @property Jemaat $jemaat
 * @property JemaatProgramJenis $program
 */
class JemaatProgram extends \yii\db\ActiveRecord
{

    public $bidang_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'program_id'], 'required'],
            [['jemaat_id', 'program_id'], 'integer'],
            [['keterangan'], 'string'],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => JemaatProgramJenis::className(), 'targetAttribute' => ['program_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Program-program',
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
            'program_id' => 'Program ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(JemaatProgramJenis::className(), ['id' => 'program_id']);
    }

    public function getNamaFull()
    {
        return $this->program->nama_program . ' di ' . $this->jemaat->namaFull;
    }       
}
