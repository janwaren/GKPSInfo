<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "organisasi_kantor_pusat".
 *
 * @property integer $id
 * @property integer $level_internal_id
 * @property string $nama
 * @property integer $super_id
 * @property string $deskripsi
 * @property string $telp
 * @property string $email
 * @property string $status
 *
 * @property KarirKantorPusat[] $karirKantorPusats
 * @property LevelKantorPusat $levelInternal
 * @property OrganisasiKantorPusat $super
 * @property OrganisasiKantorPusat[] $organisasiKantorPusats
 */
class OrganisasiKantorPusat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisasi_kantor_pusat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_internal_id', 'nama'], 'required'],
            [['level_internal_id', 'super_id'], 'integer'],
            [['deskripsi', 'status'], 'string'],
            [['nama', 'email'], 'string', 'max' => 100],
            [['telp'], 'string', 'max' => 30],
            [['nama'], 'unique'],
            [['level_internal_id'], 'exist', 'skipOnError' => true, 'targetClass' => LevelKantorPusat::className(), 'targetAttribute' => ['level_internal_id' => 'id']],
            [['super_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganisasiKantorPusat::className(), 'targetAttribute' => ['super_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Struktur Organisasi Kantor Pusat',
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
            'level_internal_id' => 'Level Internal ID',
            'nama' => 'Nama',
            'super_id' => 'Super ID',
            'deskripsi' => 'Deskripsi',
            'telp' => 'Telp',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirKantorPusats()
    {
        return $this->hasMany(KarirKantorPusat::className(), ['organisasi_kantor_pusat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevelInternal()
    {
        return $this->hasOne(LevelKantorPusat::className(), ['id' => 'level_internal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuper()
    {
        return $this->hasOne(OrganisasiKantorPusat::className(), ['id' => 'super_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganisasiKantorPusats()
    {
        return $this->hasMany(OrganisasiKantorPusat::className(), ['super_id' => 'id']);
    }

    public function getFullName()
    {
        return $this->levelInternal->nama . ' ' . $this->nama;
    }

    public function getNamaFull()
    {
        return $this->levelInternal->nama . ' ' . $this->nama;
    }    
}
