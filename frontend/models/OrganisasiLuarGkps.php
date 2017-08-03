<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "organisasi_luar_gkps".
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
 * @property KarirExternal[] $karirExternals
 */
class OrganisasiLuarGkps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisasi_luar_gkps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kota', 'negara'], 'required'],
            [['alamat'], 'string'],
            [['nama', 'email', 'website'], 'string', 'max' => 100],
            [['kota', 'propinsi', 'negara'], 'string', 'max' => 60],
            [['telp'], 'string', 'max' => 30],
            [['nama'], 'unique'],
            [['email'], 'unique'],
            [['website'], 'unique'],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Organisasi Oikoumenis',
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
    public function getKarirExternals()
    {
        return $this->hasMany(KarirExternal::className(), ['external_org_id' => 'id']);
    }

    public function getFullName()
    {
        return $this->nama . ' (' . $this->kota . ', ' . $this->propinsi . ')';
    }

    public function getNamaFull()
    {
        return $this->nama . ' (' . $this->kota . ', ' . $this->propinsi . ')';
    }       
    
}
