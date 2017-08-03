<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "etc_universitas".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $kota
 * @property string $propinsi
 * @property string $negara
 * @property string $telp
 * @property string $email
 * @property string $website
 *
 * @property FullTimerKuliah[] $fullTimerKuliahs
 */
class EtcUniversitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_universitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kota', 'propinsi', 'negara'], 'required'],
            [['alamat'], 'string'],
            [['nama', 'email', 'website'], 'string', 'max' => 100],
            [['kota', 'propinsi', 'negara'], 'string', 'max' => 60],
            [['telp'], 'string', 'max' => 30],
            [['nama'], 'unique'],
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
            'alamat' => 'Alamat',
            'kota' => 'Kota',
            'propinsi' => 'Propinsi',
            'negara' => 'Negara',
            'telp' => 'Telp',
            'email' => 'Email',
            'website' => 'Website',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerKuliahs()
    {
        return $this->hasMany(FullTimerKuliah::className(), ['universitas_id' => 'id']);
    }
}
