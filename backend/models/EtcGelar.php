<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "etc_gelar".
 *
 * @property integer $id
 * @property string $singkatan
 * @property string $nama
 * @property string $posisi
 *
 * @property FullTimerKuliah[] $fullTimerKuliahs
 */
class EtcGelar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_gelar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['singkatan', 'nama', 'posisi'], 'required'],
            [['posisi'], 'string'],
            [['singkatan'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 60],
            [['singkatan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'singkatan' => 'Singkatan',
            'nama' => 'Nama',
            'posisi' => 'Posisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerKuliahs()
    {
        return $this->hasMany(FullTimerKuliah::className(), ['gelar_id' => 'id']);
    }

    public function getGelarLengkap()
    {
        return $this->singkatan . ' (' . $this->nama . ')';
    }    
}
