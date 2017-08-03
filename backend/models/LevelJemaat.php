<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "level_jemaat".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $level
 * @property string $deskripsi
 * @property integer $posisi_id
 *
 * @property Jemaat[] $jemaats
 * @property Posisi $posisi
 */
class LevelJemaat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level_jemaat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'level', 'deskripsi'], 'required'],
            [['id', 'level', 'posisi_id'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama'], 'string', 'max' => 50],
            [['posisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Posisi::className(), 'targetAttribute' => ['posisi_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Level Organisasi Jemaat',
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
            'nama' => 'Nama',
            'level' => 'Level',
            'deskripsi' => 'Deskripsi',
            'posisi_id' => 'Posisi ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaats()
    {
        return $this->hasMany(Jemaat::className(), ['level_jemaat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosisi()
    {
        return $this->hasOne(Posisi::className(), ['id' => 'posisi_id']);
    }

    public function getNamaFull()
    {
        return $this->nama;
    }       
}
