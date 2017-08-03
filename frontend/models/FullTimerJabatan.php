<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "full_timer_jabatan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $singkatan
 *
 * @property FullTimer[] $fullTimers
 */
class FullTimerJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'deskripsi', 'singkatan'], 'required'],
            [['nama'], 'string', 'max' => 30],
            [['deskripsi'], 'string', 'max' => 200],
            [['singkatan'], 'string', 'max' => 10],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Jabatan',
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
            'deskripsi' => 'Deskripsi',
            'singkatan' => 'Singkatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimers()
    {
        return $this->hasMany(FullTimer::className(), ['jabatan_id' => 'id']);
    }

    public function getNamaFull()
    {
        return $this->nama;
    }


}
